@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>item Management</h4>
            <h6>Add/Update item</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('itemStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- item Details -->
                    <div class="row">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="item_name">Item Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="item_name" name="item_name" value="{{ old('item_name') }}" required>
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
                                    <option value="goods">Goods</option>
                                    <option value="services">Services</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="barcode">Barcode<span class="text-danger">*</span></label>
                                <input type="text" name="barcode" class="form-control" id="barcode" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">

                            <div class="form-group">
                                <label for="quantity">Quantity<span class="text-danger">*</span></label>
                                <input type="number" name="quantity" class="form-control" id="quantity" required min="1">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">

                            <div class="form-group">
                                <label for="price">Price<span class="text-danger">*</span></label>
                                <input type="number" name="price" class="form-control" id="price" required step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">

                            <div class="form-group">
                                <label for="total">Total<span class="text-danger">*</span></label>
                                <input type="number" name="total" class="form-control" id="total" readonly>
                            </div>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
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
