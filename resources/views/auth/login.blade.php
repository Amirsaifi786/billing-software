@extends('auth.main')

@section('content')
  <div class="main-wrapper">
    <div class="account-content">
      <div class="login-wrapper">
        <div class="login-content">
        <form action="{{ route('authenticate') }}" method="post">
            @csrf
          <div class="login-userset">
            <div class="login-logo">
              <img src="assets/img/logo.png" alt="img">
            </div>
            <div class="login-userheading">
              <h3>Sign In</h3>
              <h4>Please login to your account</h4>
            </div>
             {{-- <div class="form-group">
                            <select class="form-control" style="padding:11px;border-radius:5px" id="role" name="role" required>
                                <label for="Select Role">Select Role:</label>
                                <option selected>Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Staff</option>
                                <option value="3">Client</option>
                            </select>
                        </div> --}}
            <div class="form-login">
              <label>Email</label>
              <div class="form-addons">
                <input type="text" placeholder="Enter your email address @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email') }}">
                <img src="assets/img/icons/mail.svg" alt="img">
              </div>
            </div>
             @if ($errors->has('email'))

                            <span class="text-danger">{{ $errors->first('email') }}</span>

                            @endif
            <div class="form-login">
              <label>Password</label>
              <div class="pass-group">
                <input type="password" class="pass-input @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" value="{{ old('password') }}">
                <span class="fas toggle-password fa-eye-slash"></span>
              </div>
            </div>
            @if ($errors->has('password'))

                            <span class="text-danger">{{ $errors->first('password') }}</span>

                            @endif
            
            {{-- <div class="form-login">
              <div class="alreadyuser">
                <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
              </div>
            </div> --}}
            <div class="form-login">
<button type="submit" class="btn btn-login" name="submit">Sign In</button>
            </div>
            {{-- <div class="signinform text-center">
              <h4>Don’t have an account? <a href="signup.html" class="hover-a">Sign Up</a></h4>
            </div> --}}
            <div class="form-setlogin">
              <h4>Or sign up with</h4>
            </div>
            <div class="form-sociallink">
              <ul>
                <li>
                  <a href="javascript:void(0);">
                    <img src="assets/img/icons/google.png" class="me-2" alt="google">
                    Sign Up using Google
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <img src="assets/img/icons/facebook.png" class="me-2" alt="google">
                    Sign Up using Facebook
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </form>
        </div>
        <div class="login-img">
          <img src="assets/img/login.jpg" alt="img">
        </div>
      </div>
    </div>
  </div>
{{-- <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left  px-sm-4 align-items-center">
                    <div class="brand-logo" style="display: flex; justify-content: center;">
                        <img src="{{asset('/oldadmin/images/logins.png')}}" style="max-height: 200px; max-width: 200px;" alt="logo">
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


                        {{-- <div class="form-group">

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
    </div> --}}
    <!-- content-wrapper ends -->
{{-- </div> --}} --}}


<script>
    window.history.forward();

</script>


@endsection
