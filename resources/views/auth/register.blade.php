
@extends('layouts.app')

@section('content')
	<h1 class="dialog-heading">Campus Ink</h1>
	<h2 class="dialog-subheading">{{ __('SignUp to join the store') }}</h2>
	
	<form method="POST" action="{{ route('register') }}">
		@csrf
		<div id="password-login">
		   <div class="clearfix">
				<div class="login-container">
					<div id="sign-in-form" class="lform dialog-form ">
						<div id="login">
							<div class="input-group">
								<div class="next-input-wrapper">
									<label class="next-label helper--visually-hidden" for="Login">{{ __('Name') }}</label>
									 <div class="next-input--stylized">
										<span class="next-input__add-on next-input__add-on--before">
										    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
											   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-customers"></use>
											</svg>
										</span>
										<input id="name" type="text" class="next-input next-input--invisible form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

										@if ($errors->has('name'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="next-input-wrapper">
									<label class="next-label helper--visually-hidden" for="Login">{{ __('E-Mail Address') }}</label>
									 <div class="next-input--stylized">
										<span class="next-input__add-on next-input__add-on--before">
										   <svg class="next-icon next-icon--color-slate-lighter next-icon--size-20" aria-hidden="true" focusable="false">
											  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-email"></use>
										   </svg>
										</span>
										

										<input id="email" type="email" class="next-input next-input--invisible form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-Mail" value="{{ old('email') }}" required>

										@if ($errors->has('email'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
										
									</div>
								</div>

								<div class="next-input-wrapper">
								 <label class="next-label helper--visually-hidden" for="Password">{{ __('Password') }}</label>
								 <div class="next-input--stylized">
									<span class="next-input__add-on next-input__add-on--before">
									   <svg class="next-icon next-icon--color-slate-lighter next-icon--size-20" aria-hidden="true" focusable="false">
										  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-locked"></use>
									   </svg>
									</span>
									
									<input id="password" type="password" class="next-input next-input--invisible form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

									@if ($errors->has('password'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
											
								 </div>
								</div>

								<div class="next-input-wrapper">
								 <label class="next-label helper--visually-hidden" for="Password">{{ __('Confirm Password') }}</label>
								 <div class="next-input--stylized">
									<span class="next-input__add-on next-input__add-on--before">
									   <svg class="next-icon next-icon--color-slate-lighter next-icon--size-20" aria-hidden="true" focusable="false">
										  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-locked"></use>
									   </svg>
									</span>
									<input id="password-confirm" type="password" class="next-input next-input--invisible form-control" placeholder="Password confirmation"  name="password_confirmation" required>
											
								 </div>
								</div>
								
								<button type="submit" class="ui-button ui-button--primary ui-button--full-width dialog-submit">
									{{ __('SignUp') }}
								</button>
								<div id="remember-me" class="remember-me">
									<a class="forgot-password inline" href="{{ route('login') }}">
											{{ __('Login') }}
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
