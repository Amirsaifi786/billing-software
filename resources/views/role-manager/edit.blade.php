@extends('layouts.master')
@section('content')
{{-- @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y" style="padding-left:20px;">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('roleIndex') }}">Role Manager</a>/</span> Edit</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <small class="text-muted float-end"><a href="{{ route('roleIndex') }}"><i class="bx bx-arrow-back"></i><b>
                                <h5> Back</h5>
                            </b></a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('roleUpdate', $roles->id) }}" method="POST" enctype="multipart/form-data">@method('PATCH')
                        @csrf
                        <input type="hidden" id="id" value="{{ $roles->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="name" value="{{old('name',$roles->name)}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 permission">
                            <label class="form-label">Permissions</label>
                            <div class="form-group">
                                <label>Permissions</label>
                                <div class="form-check form-check-inline mt-3" style="margin-left: 10px;">
                                    <input class="ChildCheckBox form-check-input selectall" type="checkbox">
                                    <label class="form-check-label " for="inlineCheckbox1"><b>Select all</b></label>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($modules as $row)
                                <div class="col-md-3 mt-4">
                                    <small class="fw-semibold d-block">{{$row}} Manager</small>
                                    <div class="form-check  mt-3">
                                        <input class="ChildCheckBox form-check-input list" type="checkbox" name="{{ $row." list" }}" id="inlineCheckbox1" value="1" @if($roles->hasPermissionTo($row." list")) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">List</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="ChildCheckBox form-check-input add" type="checkbox" name="{{ $row." add" }}" id="inlineCheckbox2" value="1" @if($roles->hasPermissionTo($row." add")) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">Add</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="ChildCheckBox form-check-input edit" type="checkbox" name="{{ $row." edit" }}" id="inlineCheckbox3" value="1" @if($roles->hasPermissionTo($row." edit")) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox3">Edit</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="ChildCheckBox form-check-input delete" type="checkbox" name="{{ $row." delete" }}" id="inlineCheckbox3" value="1" @if($roles->hasPermissionTo($row." delete")) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Role Edit</h4>
            <h6>Update your Role</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('roleUpdate', $roles->id) }}" method="POST" enctype="multipart/form-data">@method('PATCH')
                @csrf
                <input type="hidden" id="id" value="{{ $roles->id }}">
                <div class="row">

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="name" value="{{old('name',$roles->name)}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>




                   
                    <div class="col-lg-3 col-sm-6 col-12">

                        <div class="form-group">
                            <label>Permissions</label>
                            <div class="form-check form-check-inline mt-3" style="margin-left: 10px;">
                                <input class="ChildCheckBox form-check-input selectall" type="checkbox">
                                <label class="form-check-label " for="inlineCheckbox1"><b>Select all</b></label>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-lg-3 col-sm-6 col-12"> --}}
                    <div class="row">
                        @foreach($modules as $permission)
                        <div class="col-md-3 mt-4">
                            <small class="fw-semibold d-block">{{$permission}} Manager</small>
                            <div class="form-check  mt-3">
                                <input class="ChildCheckBox form-check-input list" type="checkbox" name="{{ $permission." list" }}" id="inlineCheckbox1" value="1" @if($roles->hasPermissionTo($permission." list")) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox1">List</label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="ChildCheckBox form-check-input add" type="checkbox" name="{{ $permission." add" }}" id="inlineCheckbox2" value="1" @if($roles->hasPermissionTo($permission." add")) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox2">Add</label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="ChildCheckBox form-check-input edit" type="checkbox" name="{{ $permission." edit" }}" id="inlineCheckbox3" value="1" @if($roles->hasPermissionTo($permission." edit")) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox3">Edit</label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="ChildCheckBox form-check-input delete" type="checkbox" name="{{ $permission." delete" }}" id="inlineCheckbox3" value="1" @if($roles->hasPermissionTo($permission." delete")) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- </div> --}}


                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('input:checkbox').prop('checked', true);
        } else {
            $('input:checkbox').prop('checked', false);
        }
    });
    $(".add, .edit, .delete").click(function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().find('.list').prop('checked', true);
        } else {
            $(".add, .edit, .delete").parent().parent().prop('checked', false);
        }
    });

</script>
@endsection
