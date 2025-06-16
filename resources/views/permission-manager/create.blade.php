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
            <h4>permission Add</h4>
            <h6>Create new permission</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{ Route('permissionStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">       

                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                            <div style="padding:10px"><span class="text-danger ">First letter is capitalized like  " Item , Customer " no space allowed</span></div>
                    </div>


                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2">Submit</button>
                        <a href="permissionlist.html" class="btn btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
