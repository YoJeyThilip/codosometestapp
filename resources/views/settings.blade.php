@extends('layouts.dashboard')

@section('dashboard-content')
<div class="Polaris-Page">
   <div class="Polaris-Page__Header">
      <div class="Polaris-Page__Title">
         <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">General</h1>
      </div>
      <div class="Polaris-Page__Actions"></div>
   </div>
   <form action="{{ route('settings') }}" accept-charset="UTF-8" method="post">
	  @csrf
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
                     <div class="Polaris-Card">
                        <div class="Polaris-Card__Section">
                           <div class="Polaris-FormLayout">
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
                           </div>
                        </div>
                     </div>
                     <div class="Polaris-Card">
                        <div class="Polaris-Card__Section">
                            <div class="Polaris-SettingAction">
							  <div class="Polaris-SettingAction__Setting">
								 <div class="Polaris-Stack">
									@if($printavo_status == 'connected')
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
									@endif
									<div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
									   <div class="Polaris-AccountConnection__Content">
										  <div>@if($printavo_status == 'connected') {{ $avatar_name }} @else Printavo @endif </div>
										  <div><span class="Polaris-TextStyle--variationSubdued"> @if($printavo_status == 'connected') Account connected  @else No account connected @endif </span></div>
									   </div>
									</div>
								 </div>
							  </div>
							  <div class="Polaris-SettingAction__Action">
								<input type="submit" name="setting-form" class="Polaris-Button Polaris-Button--primary" value="{{ ( $printavo_status == 'connected' ? 'Disconnect' : 'Connect') }}">
							  </div>
						    </div>
							@if($printavo_status != 'connected')
							   <div class="Polaris-AccountConnection__TermsOfService">
								  <p>By clicking <strong>Connect</strong>, you agree to accept Printavo App’s <a class="Polaris-Link" href="Example App" data-polaris-unstyled="true">terms and conditions</a>.</p>
							   </div>
							@endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
@endsection