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
											<input id="email" type="email" class="next-input next-input--invisible form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

											@if ($errors->has('email'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
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
									<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
									@if ($errors->has('password'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-6 offset-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Login') }}
									</button>

									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
