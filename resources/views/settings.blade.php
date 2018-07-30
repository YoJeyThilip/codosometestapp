@extends('layouts.dashboard')

@section('dashboard-content')
<div class="Polaris-Page">
	<div class="Polaris-Page__Header">
	  <div class="Polaris-Page__Title">
		 <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">General</h1>
	  </div>
	  <div class="Polaris-Page__Actions"></div>
	</div>
	<div class="Polaris-Page__Content">
	 <div class="Polaris-Layout">
		<div class="Polaris-Layout__AnnotatedSection">
		   <div class="Polaris-Layout__AnnotationWrapper">
			  <div class="Polaris-Layout__Annotation">
				 <div class="Polaris-TextContainer">
					<h2 class="Polaris-Heading">Printavo API</h2>
					<p>This API is used to access information in your Printavo account.</p>
				 </div>
			  </div>
			  <div class="Polaris-Layout__AnnotationContent">			
				<form action="{{ route('settings') }}" accept-charset="UTF-8" method="post">
					@csrf
					 <div class="Polaris-Card">
						<div class="Polaris-Card__Section">
						
							@if($printavo_status == 'connected')
								
								<div class="Polaris-SettingAction connect_printavo_acc">
								  <div class="Polaris-SettingAction__Setting">
									 <div class="Polaris-Stack">
										<div class="Polaris-Stack__Item">
											<span class="printavo_settings_user-avatar user-avatar user-avatar--style-4" style="background-color: {{ $avatar_background_color }}">
												<span class="user-avatar__initials">
													{{ $avatar_initials }}
												</span>
												@if( $avatar_url_small != '' )
													<img alt="" class="gravatar gravatar--size-thumb" src="{{ $avatar_url_small }}">
												@endif
											</span>
										</div>
										<div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
										   <div class="Polaris-AccountConnection__Content">
											  <div>{{ $avatar_name }}</div>
											  <div><span class="Polaris-TextStyle--variationSubdued">Account connected</span></div>
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="Polaris-SettingAction__Action">
									<input type="submit" name="printavo-connect-form" class="Polaris-Button Polaris-Button--primary" value="Disconnect">
								  </div>
								</div>
								
							@else
							
								<div class="Polaris-FormLayout disconnect_printavo_acc">
									<div class="Polaris-FormLayout__Item">
										<div class="">
											<div class="Polaris-Labelled__LabelWrapper">
												<div class="Polaris-Label"><label id="TextField1Label" for="TextField1" class="Polaris-Label__Text">Email</label></div>
											</div>
											<div class="Polaris-TextField">
												<input id="TextField1" name="email" type="email" class="Polaris-TextField__Input" aria-labelledby="TextField1Label" aria-invalid="false" value="{{ $printavo_email }}">
												<div class="Polaris-TextField__Backdrop"></div>
											</div>
										</div>
									</div>
									<div class="Polaris-FormLayout__Item">
										<div class="">
											<div class="Polaris-Labelled__LabelWrapper">
												<div class="Polaris-Label"><label id="TextField2Label" for="TextField2" class="Polaris-Label__Text">Password</label></div>
											</div>
											<div class="Polaris-TextField">
												<input id="settings_password" class="Polaris-TextField__Input" name="password" type="password" aria-labelledby="TextField2Label" aria-invalid="false" value="{{ $avatar_password }}"> 
												<div class="Polaris-TextField__Backdrop"></div>
											</div>
										</div>
									</div>
									<div class="Polaris-SettingAction__Action">
										<input type="submit" name="printavo-connect-form" class="Polaris-Button Polaris-Button--primary" value="Connect">
									</div>
								</div>
								<div class="Polaris-AccountConnection__TermsOfService">
									<p>By clicking <strong>Connect</strong>, you agree to accept Printavo App’s <a class="Polaris-Link" href="Example App" data-polaris-unstyled="true">terms and conditions</a>.</p>
								</div>
								
							@endif
							
						</div>
					 </div>
				</form>
		   </div>
		 </div>
		</div>
			@if( intval($user_role) > 3 )
				<div class="Polaris-Layout__AnnotatedSection">
					<div class="Polaris-Layout__AnnotationWrapper">
						<div class="Polaris-Layout__Annotation">
							<div class="Polaris-TextContainer">
								<h2 class="Polaris-Heading">Printavo API</h2>
								<p>This API is used to access information in your Printavo account.</p>
							</div>
						</div>
						<div class="Polaris-Layout__AnnotationContent">	
							<form action="{{ route('settings') }}" accept-charset="UTF-8" method="post">
								@csrf
								<div class="Polaris-Card">
									<div class="Polaris-Card__Section">
										<div class="Polaris-Labelled__LabelWrapper">
											<div class="Polaris-Label">
												<label for="add_campus" class="next-label">Add Campus</label>
											</div>
										</div>
										<div class="Polaris-SettingAction">
											<div class="Polaris-SettingAction__Setting">
												<div class="Polaris-Stack">
													<div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
														<input class="next-input js-no-dirty" placeholder="Vintage, cotton, summer" id="add_campus" size="30" type="text" >
													</div>
												</div>
											</div>
											<div class="Polaris-SettingAction__Action">
												<button id="add_campus_btn" class="Polaris-Button">Add option</button>
											</div>
										</div>
										<ul class="js-tag-list next-token-list st" id="campus_list">
											@foreach( $campus_list as $campus_name )
												<li class="next-token">
													<span class="next-token__label">{{ $campus_name }}</span>
													<a class="next-token__remove">
														<input type="hidden" name="campus_list[]" value="{{ $campus_name }}">
														<span class="next-token__remove__icon">
															<svg class="next-icon next-icon--size-10 next-icon--no-nudge">
																<use xlink:href="#next-remove"></use>
															</svg>
														</span>
													</a>
												</li>
											@endforeach
										</ul>
									</div>
								</div>

								<div class="Polaris-SettingAction__Action setting_save_btn">
								<input type="submit" name="setting-form" class="Polaris-Button Polaris-Button--primary" value="save">
								</div>

							</form>
						</div>
					</div>
				</div>
				
				<div class="cron_control_manager_container">
					<form action="" method="post">
						<input type="hidden" name="run_command" value="yes">
						<input type="submit" class="run_cron_button" value="Run Command">
					</form>
				</div>
				
			@endif
			
		</div>
	</div>
</div>
@endsection

@section('Script-content')
	<script>
		$('#add_campus_btn').click(function(e){
			e.preventDefault();
			var new_campus = $('#add_campus').val();
			$('#add_campus').val('');
			if( new_campus != '' ){
				$('#campus_list').append(
									'<li class="next-token">'+
									   '<span class="next-token__label">'+new_campus+'</span>'+
									   '<a class="next-token__remove">'+
										  '<input type="hidden" name="campus_list[]" value="'+new_campus+'">'+
										  '<span class="next-token__remove__icon">'+
											 '<svg class="next-icon next-icon--size-10 next-icon--no-nudge">'+
												'<use xlink:href="#next-remove"></use>'+
											 '</svg>'+
										  '</span>'+
									   '</a>'+
									'</li>'
				);
			}
		});
		
		$('#campus_list').on('click','.next-token__remove',function(e){
			e.preventDefault();
			$(this).parents('.next-token').remove();
		});
		
	</script>
@endsection