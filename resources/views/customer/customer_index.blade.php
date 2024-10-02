@extends('layouts.master')
@section('content')
@if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<style>
.small-avatar {
    width: 50px;
    height: 50px;
    object-fit: cover; /* Ensures the image fits the dimensions without distortion */
}

</style>
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customer</h6>
        </div>
        {{-- @can('Customer add') --}}

        <div class="page-btn">
            <a href="{{ route('customerCreate') }}" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">Add New Customer</a>
        </div>
        {{-- @endcan --}}
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{ asset('assets/img/icons/filter.svg')}}" alt="img">
                            <span><img src="{{ asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg')}}" alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ asset('assets/img/icons/pdf.svg')}}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ asset('assets/img/icons/excel.svg')}}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ asset('assets/img/icons/printer.svg')}}" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Customer</option>
                                            <option>Macbook pro</option>
                                            <option>Orange</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Computers</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Computer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Brand</option>
                                            <option>N/D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12 ">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Price</option>
                                            <option>150.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="{{ asset('assets/img/icons/search-whites.svg')}}" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Id</th>
                            <th>Customer</th>
                            <th>email</th>
                            <th>mobile_no</th>
                            <th>Address</th>
                            <th>Zip_code</th>
                            <th>Tax_identification_no</th>
                            <th>Account_type</th>
                            <th>Opening_balance</th>
                            <th>Document_type</th>
                            <th>Document_no</th>
                            <th>Credit_allowed</th>
                            <th>Remark</th>
                            <th>Avatar</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $key => $customer)


                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>

                            <td>{{ $key+1  }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->mobile_no }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->zip_code }}</td>
                            <td>{{ $customer->tax_identification_no }}</td>
                            <td>{{ $customer->account_type }}</td>
                            <td>{{ $customer->opening_balance }}</td>
                            <td>{{ $customer->document_type }}</td>
                            <td>{{ $customer->document_no }}</td>
                            <td>{{ $customer->credit_allowed }}</td>
                            <td>{{ $customer->remark }}</td>
                            <td>    <img class="avatar-img rounded small-avatar" alt="User Image" 
         src="{{ asset('storage/images/' . $customer->avatar) }}">                 </td>

                            <td>
                                <a class="me-3" href="{{ route('customerUpdate',$customer->id) }}">
                                    <img src="{{ asset('assets/img/icons/eye.svg')}}" alt="img">
                                </a>
                                {{-- @can('Customer edit') --}}

                                <a class="me-3" href="{{ route('customerEdit',$customer->id) }}">
                                    <img src="{{ asset('assets/img/icons/edit.svg')}}" alt="img">
                                </a>
                                {{-- @endcan 
                                @can('Customer delete') --}}
                                <a class="confirm-text" href="{{ route('customerDestroy',$customer->id) }}">
                                    <img src="{{ asset('assets/img/icons/delete.svg')}}" alt="img">
                                </a>
                                {{-- @endcan --}}

                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
