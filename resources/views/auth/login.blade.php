@extends('layouts.auth')

@section('content')
<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="mb-2">Login</h2>
                        <p>Silahkan login terlebih dahulu untuk masuk ke dalam sistem layanan</p>
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="text" placeholder=" " name="username">
                                        <label>Username</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="password" placeholder=" " name="password">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 rtl-left">
                                    <a href="auth-recoverpw.html" class="text-primary float-right">Forgot
                                        Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <p class="mt-3">
                                Create an Account <a href="auth-sign-up.html" class="text-primary">Sign Up</a>
                            </p>
                        </form>
                    </div>
                    <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                        <img src="../assets/images/login/01.png" class="img-fluid w-80" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection