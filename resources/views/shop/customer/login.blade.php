@extends('shop.master')
@section('title', 'LOGIN | E-SHOPPER')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
                @include('errors.note')
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#">
							<input type="text" placeholder="Name" />
							<input type="email" placeholder="Email Address" />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('shop/customer/sign-up')}}" method="POST">
                            @csrf
							<input type="text" name="username" value="{{old('username')}}" required placeholder="Name"/>
							<input type="email" name="email" value="{{old('email')}}" required placeholder="Email Address"/>
							<input type="password" name="password" required placeholder="Password" value="{{old('email')}}"/>
							<input type="password" name="re_password" value="{{old('re_password')}}" required placeholder="Re-Password"/>
							<button type="submit" name="sign-up" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
