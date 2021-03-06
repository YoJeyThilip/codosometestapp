@extends('layouts.app')

@section('content')
	<h1 class="dialog-heading">Campus Ink</h1>
	<h2 class="dialog-subheading">Log in to manage your store</h2>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div id="password-login">
				<div class="clearfix">
					<div class="login-container">
						<div id="sign-in-form" class="lform dialog-form ">
							<div id="login">
								<div class="input-group">
								    <div class="next-input-wrapper">
										<label class="next-label helper--visually-hidden" for="Login">Login</label>
										 <div class="next-input--stylized">
											<span class="next-input__add-on next-input__add-on--before">
											   <svg class="next-icon next-icon--color-slate-lighter next-icon--size-20" aria-hidden="true" focusable="false">
												  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-email"></use>
											   </svg>
											</span>
											<input id="email" type="email"  placeholder="Email"  class="next-input next-input--invisible form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
										</div>
									</div>

									<div class="next-input-wrapper">
									 <label class="next-label helper--visually-hidden" for="Password">Password</label>
									 <div class="next-input--stylized">
										<span class="next-input__add-on next-input__add-on--before">
										   <svg class="next-icon next-icon--color-slate-lighter next-icon--size-20" aria-hidden="true" focusable="false">
											  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-locked"></use>
										   </svg>
										</span>
									<input id="password"  placeholder="Password" type="password" class="next-input next-input--invisible form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
								</div>
							</div>
							@if ($errors->has('email'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
									<button type="submit" class="ui-button ui-button--primary ui-button--full-width dialog-submit">
										{{ __('Login') }}
									</button>
								<div id="remember-me" class="remember-me">
								<div class="next-input-wrapper">
										<label class="next-label next-label--switch" for="remember_checkbox"> Remember Me</label>
											<input type="checkbox"  class="next-checkbox"  id="remember_checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
										</label>
									<span class="next-checkbox--styled"><svg class="next-icon next-icon--size-10 checkmark" aria-hidden="true" focusable="false"> <use xlink:href="#next-checkmark-thick"></use> </svg></span>
								</div>
									<a class="forgot-password inline" href="{{ route('password.request') }}">
											{{ __('Forgot Your Password?') }}
									</a>
									<a class="forgot-password inline" href="{{ route('register') }}">
											{{ __('Register') }}
									</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection
