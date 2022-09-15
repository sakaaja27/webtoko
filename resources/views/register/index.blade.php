@extends('layouts.main')
@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="row justify-content-center mt-5">
	<div class="col-5">
		<div class="container2 mt-5">	
		 	<form action="/register" method="POST" class="login-email">
				@csrf
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
				<div class="input-group">
					<input type="text" placeholder="name" name="name"  value="" required>
				</div>
				<div class="input-group">
					<input type="email" placeholder="name@example" name="email" value="" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="your password" name="password" value="" required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Register</button>
				</div>
				<p class="login-register-text">Have an account? <a href="/login">Login Here</a>.</p>
			</form>
		</div>
	</div>
</div>

@endsection