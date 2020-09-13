@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
        {{--<div class="wrapper without_header_sidebar">
            <!-- contnet wrapper -->
            <div class="content_wrapper">
                    <!-- page content -->
                    <div class="login_page center_container">
                        <div class="center_content">
                            <div class="logo">
                                <img src="{{asset('public/panel/assets/images/logo.png')}}" alt="" class="img-fluid">
                            </div>
                            <form action="{{route('login')}}" class="d-block" method="post">
                                @csrf
                                <div class="form-group icon_parent">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a class="registration" href="{{route('register')}}">Create new account</a><br>
                                    <a href="{{ route('password.request') }}" class="text-white">I forgot my password</a>
                                    <button type="submit" class="btn btn-blue">Login</button>
                                </div>
                            </form>
                            <div class="footer">
                                <p>Copyright &copy; 2019 <a href="https://durbarit.com/">Durbar IT</a>. All rights reserved.</p>
                            </div>
                            
                        </div>
                    </div>
            </div><!--/ content wrapper -->
        </div><!--/ wrapper -->--}}
        <div class="contact_form" style="background-color: #9dc8e2;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1" style=" border: 5px solid grey; padding: 20px; font-style: italic; background-color: #000046; color: grey; font-weight: bold">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign In</div>
                            <form action="{{route('login')}}" id="contact_form" method="post">
                              @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address or phone</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                           aria-describedby="emailHelp" placeholder="email or phone" required="">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                           aria-describedby="emailHelp" placeholder="password" required="">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-success">Login</button>
                                </div>
                            </form>
                            <br>
                            <a href="{{ route('password.request') }}"> I Forget My Password</a>
                            <br><br><br>
                            <button type="submit" class="btn btn-primary btn-block">Login with Facebook</button>
                            <a href="https://accounts.google.com/ServiceLogin/signinchooser" class="btn btn-danger btn-block">Login with Google</a>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1" style="border: 5px solid grey; padding: 20px; font-style: italic; background-color: #000046; color: grey; font-weight: bold">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center" >Sign up</div>
                            <form action="{{route('register')}}" id="contact_form" method="post">
                              @csrf
                                <div class="form-group icon_parent">
                                    <label for="uname">Full Name</label>
                                    <input type="text" class="form-control " name="name"  autofocus placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                                           aria-describedby="emailHelp" placeholder="Phone" required="" >
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                           aria-describedby="emailHelp" placeholder="Email" required="">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required=""  placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required="" placeholder="Re-type password" >
                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-info">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel"></div>
        </div>
@endsection
