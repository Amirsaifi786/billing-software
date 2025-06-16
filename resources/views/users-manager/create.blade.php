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
            <h4>User Add</h4>
            <h6>Add your User</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ Route('userStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">


                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="basic-default-email">Email<span class="text-danger">*</span></label>

                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="basic-default-email" name="email" placeholder="Email" aria-label="john.doe" aria-describedby="basic-default-email2" value="{{ old('email')}}">

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="form-label">Role</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="role" aria-label="Default select example">
                                <option disabled selected>Select Role</option>
                                @foreach($roles as $key => $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('userIndex') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
{{-- @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y" style="padding-left:20px;">
    <h4 class="fw-bold py-3 "><span class="text-muted fw-light"><a href="{{ route('userIndex')}}">User Manager</a> /</span> Add</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center p-2">
                    <h5 class="mb-0"></h5>
                    <small class="text-muted float-end"><a href="{{ route('userIndex') }}"><i class="bx bx-arrow-back"></i><b>
                                <h5> Back</h5>
                            </b></a></small>
                </div>
                <div class="card-body">
                    <form action="{{ Route('userStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Email<span class="text-danger">*</span></label>

                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="basic-default-email" name="email" placeholder="Email" aria-label="john.doe" aria-describedby="basic-default-email2" value="{{ old('email')}}">

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Role</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="role" aria-label="Default select example">
                                <option disabled selected>Select Role</option>
                                @foreach($roles as $key => $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <small class="fw-semibold d-block">Status</small>
                            @php
                            $checked = '';
                            $notchecked = '';
                            if (old('status') == '1') {
                            $checked = 'checked';
                            } elseif (old('status') != '1' && old('status') != '0') {
                            $checked = 'checked';
                            } else {
                            $notchecked = 'checked';
                            }
                            @endphp
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" checked="" />
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{ $notchecked }} />
                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
