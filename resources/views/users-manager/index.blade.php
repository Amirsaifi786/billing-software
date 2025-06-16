@extends('layouts.master')
@section('content')
 @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif 
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h4>User List</h4>
            <h6>Manage your User</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('userCreate') }}" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">Add New user</a>
        </div>
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
                                            <option>Choose user</option>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key =>$user)
                        <tr>

                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>

                            <td>{{ $key+1}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>@if(!empty($user->getRoleNames()))

                                @foreach($user->getRoleNames() as $role)

                                <span class="text-muted">{{ $role }}</span>

                                @endforeach
                                @endif</td>


                            <td>
                                {{-- <a class="me-3" href="user-details.html">
                                    <img src="{{ asset('assets/img/icons/eye.svg')}}" alt="img">
                                </a> --}}
                                @can('User edit')

                                <a class="me-3" href="{{ route('userEdit', $user->id) }}">
                                    <img src="{{ asset('assets/img/icons/edit.svg')}}" alt="img">
                                </a>
                                @endcan

                                @can('User delete')

                                <a class="confirm-text" href="{{ route('userDestroy', $user->id) }}">
                                    <img src="{{ asset('assets/img/icons/delete.svg')}}" alt="img">
                                </a>
                                @endcan
                            </td>

                        </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
            {{-- {{$user->appends(['table_length' => Request::get('table_length')])->links()}}
            <form action="" method="GET">
                <div class="dataTables_length" id="DataTables_Table_0_length">
                    <label>Show
                        <select name="table_length" aria-controls="DataTables_Table_0" class="drop table-length form-select form-control-sm">
                            <option value="10" @if(Request::get('table_length')==10) selected @endif>10</option>
                            <option value="20" @if(Request::get('table_length')==20) selected @endif>20</option>
                            <option value="30" @if(Request::get('table_length')==30) selected @endif>30</option>
                        </select>
                        Entries</label>
                </div>
            </form> --}}
        </div>
    </div>

</div>
@push('scripts')
<script type="text/javascript">
    $(function() {
        $('.table-length').change(function() {
            this.form.submit();
        });
    });

</script>
@endpush
@endsection
