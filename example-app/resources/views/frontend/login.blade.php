@extends('frontend.master')
@section('content')

<section class="profile-authentication-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="login_submit" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Username or email</label>
                            <input type="text" class="form-control" placeholder="Username or email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                <p>
                                    <input type="checkbox" id="test2">
                                    <label for="test2">Remember me</label>
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                <a href="{{ route('password.request') }}" class="lost-your-password">Forget password</a>
                            </div>
                        </div>
                        <button type="submit">Log In</button>
                        <hr>
                        <a href="" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="login-form">
                    <h2>Register</h2>
                    <form action="{{url('/sign_up')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username or email" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Username or email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <p class="description">The password should be at least eight characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>
                        <button type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
