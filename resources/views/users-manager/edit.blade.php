@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>User Edit</h4>
            <h6>Update your user</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('userUpdate', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <input type="hidden" id="id" value="{{ $user->id }}">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="basic-default-fullname">Name<span class="text-danger">*</span></label>
                            <input type="text" id="basic-default-fullname" name="name" class="form-control" placeholder="Name" value="{{old('name',$user->name)}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    



                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="basic-default-email">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="basic-default-email" name="email" placeholder="Email" aria-label="john.doe" aria-describedby="basic-default-email2" value="{{ old('email',$user->email)}}">

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="form-label">Role<span class="text-danger">*</span></label>
                            <select class="form-select" id="exampleFormControlSelect1" name="role">
                                <option>Select Role</option>
                                @foreach($roles as $key => $role)
                                <option value="{{ $role->id }}" @if($user->roles->first()->id == $role->id) selected @endif >{{ $role->name }}</option>
                                @endforeach


                            </select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1" class="form-label">Role<span class="text-danger">*</span></label>
        <select class="form-select" id="exampleFormControlSelect1" name="role">
            <option>Select Role</option>
            @foreach($roles as $key => $role)
                <option value="{{ $role->id }}" 
                    @if($user->roles->first() && $user->roles->first()->id == $role->id) 
                        selected 
                    @endif
                >
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        @error('role')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>



                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="{{ route('userIndex') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
