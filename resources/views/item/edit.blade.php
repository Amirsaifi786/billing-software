@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>item Management</h4>
            <h6>Update item</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('itemUpdate',$items->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- item Details -->
                    <div class="row">
                        {{-- <div class="col-lg-3 col-sm-6 col-12"> --}}

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="item_name">Item Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control  @error('item_name') @enderror " id="item_name" name="item_name" value="{{ old('item_name',$items->item_name) }}" required>
                                    @error('item_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="item_type">Item Type<span class="text-danger">*</span></label>
                                    <select name="item_type" class="form-control" id="item_type" required>
                                        <option disabled selected>Select Item Type</option>

                                        <option value="goods" {{ old('item_type', $items->item_type) == 'goods' ? 'selected' : '' }}>Goods</option>
                                        <option value="services" {{ old('item_type', $items->item_type) == 'services' ? 'selected' : '' }}>services</option>

                                    </select>
                                    @error('item_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="barcode">Barcode<span class="text-danger">*</span></label>
                                    <input type="text" name="barcode" class="form-control  @error('barcode') is-invalid @enderror " id="barcode" value="{{ old('barcode',$items->barcode) }}" required>
                                    @error('barcode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div >
                                    
                                    {!! DNS1D::getBarcodeHTML($items->barcode, 'C128') !!}</div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="quantity">Quantity<span class="text-danger">*</span></label>
                                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror " id="quantity" value="{{ old('quantity',$items->quantity) }}" required min="1">
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">

                                <div class="form-group">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror " id="price" value="{{ old('price',$items->price) }}" required step="0.01">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">

                                <div class="form-group">
                                    <label for="total">Total<span class="text-danger">*</span></label>
                                    <input type="number" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total',$items->total) }}" id="total" readonly>
                                    @error('total')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('itemIndex') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    document.getElementById('quantity').addEventListener('input', calculateTotal);
    document.getElementById('price').addEventListener('input', calculateTotal);

    function calculateTotal() {
        const quantity = document.getElementById('quantity').value || 0;
        const price = document.getElementById('price').value || 0;
        document.getElementById('total').value = (quantity * price).toFixed(2);
    }

</script>

@endsection
