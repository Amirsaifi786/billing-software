@extends('auth.main')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left  px-sm-4 align-items-center">
                    <div class="brand-logo" style="display: flex; justify-content: center;">
                        <img src="{{asset('/images/logins.png')}}" style="max-height: 200px; max-width: 200px;" alt="logo">
                    </div>
                    <h3 style="text-align:center;"><strong>Admin Login</strong></h3>
                    <form action="{{ route('authenticate') }}" class="pt-3" method="post">
                        @csrf
                        {{-- <div class="form-group">
                            <select class="form-control" style="padding:11px;border-radius:5px" id="role" name="role" required>
                                <label for="Select Role">Select Role:</label>
                                <option selected>Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Staff</option>
                                <option value="3">Client</option>
                            </select>
                        </div> --}}


                        <div class="form-group">

                            <label>Email</label>
                            <input type="email" style="padding:11px;border-radius:5px" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">



                            @if ($errors->has('email'))

                            <span class="text-danger">{{ $errors->first('email') }}</span>

                            @endif


                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" style="padding:11px;border-radius:5px" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" value="">

                            @if ($errors->has('password'))

                            <span class="text-danger">{{ $errors->first('password') }}</span>

                            @endif

                        </div>


                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary" style="border-radius:5px !important; border-color:#fbfbfb;
               margin-bottom: 20px;margin-top: 2px; width:210px;background:#179ed8!important;">Login</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
{{-- //main --}}

<script>
    window.history.forward();

</script>


@endsection
