@extends('layouts.master')
@section('content')
@if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y"style="padding-left:20px;">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('permissionIndex')}}">Permission Manager</a>/</span> Edit</h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <small class="text-muted float-end"><a href="{{ route('permissionIndex') }}"  ><i class="bx bx-arrow-back"></i><b><h5> Back</h5></b></a></small>
                  </div>
                   <div class="card-body">
                      <form  action="{{ Route('permissionUpdate',$permissions->id) }}" method="POST"enctype="multipart/form-data">@method('PATCH')                                          @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="Name like: Permissions" value="{{ old('name',$permissions->name) }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>                  
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
