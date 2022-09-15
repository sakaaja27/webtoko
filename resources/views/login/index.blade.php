@extends('layouts.main')
@section('container')
<!-- style -->
<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="row justify-content-center mt-5">
    <div class="col-5 mt-5">
         @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        @if(session()->has('LoginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('LoginError') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="container2 mt-5 ">
            <form action="/login" method="POST" class="login-email">
                @csrf
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="" autofocus required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Anda belum punya akun? <a href="/register">Register</a></p>
            </form>
        </div>
    </div>
</div>
@endsection



