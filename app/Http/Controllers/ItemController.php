<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Milon\Barcode\DNS1D;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $items=Item::all();
       return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $items=Item::all();
        return view('item.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

   
    // Generate the barcode PNG
    $barcode = $request->input('barcode');
    $barcodeImage = DNS1D::getBarcodePNGPath($barcode, 'C128');
    \Storage::put('public/images/' . $barcode . '.png', file_get_contents($barcodeImage));

    Item::create([
        'item_name' => $request->item_name,
        'item_type' => $request->item_type,
        'barcode' => $barcode,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'total' => $request->total,
        'barcode_image_path' => 'storage/barcodes/' . $barcode . '.png'
    ]);

    return redirect()->back()->with('success', 'Invoice item added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $items=Item::find($id);
        return view('item.edit',compact('items'));
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the item by ID
        $item = Item::find($id);
    
        // Validate the request data
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_type' => 'required|in:goods,services',
            'barcode' => 'required|string|max:255|unique:items,barcode,' . $id,
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
    
        // Generate barcode PNG using instance of DNS1D
        $barcode = $request->input('barcode');
        $barcodeGenerator = new DNS1D(); // Create an instance of DNS1D
        $barcodeImage = $barcodeGenerator->getBarcodePNG($barcode, 'C128'); // Generate barcode PNG
    
        // Save barcode as an image to the storage
        \Storage::put('public/barcodes/' . $barcode . '.png', $barcodeImage);
    
        // Update item fields and calculate total
        $item->update([
            'item_name' => $request->item_name,
            'item_type' => $request->item_type,
            'barcode' => $barcode,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total' => $request->quantity * $request->price,
            'barcode_image_path' => 'storage/barcodes/' . $barcode . '.png', // Save path to DB
        ]);
    
        return redirect()->back()->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
