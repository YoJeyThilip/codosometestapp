@extends('layouts.dashboard')

@section('dashboard-content')
<header class="ui-title-bar-container order_single_header">
   <div class="ui-title-bar" id="order-title-bar" data-tg-refresh="order-title-bar">
      <div class="ui-title-bar__navigation">
         <div class="ui-breadcrumbs hide-when-printing">
            <a href="{{ route('students.index') }}" class="ui-button ui-button--transparent ui-breadcrumb" data-bind-href="Shopify.AdjacentResources.lastSearchURI(this, 'order')">
               <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                  <use xlink:href="#chevron-left-thinner"></use>
               </svg>
               <span class="ui-breadcrumb__item">All Students</span>
            </a>
         </div>
      </div>
   </div>
   <div class="collapsible-header">
      <div class="collapsible-header__heading"></div>
   </div>
</header>
<div class="ui-layout order_single_content students_single_content">
   <div class="ui-layout__sections">
      <div class="ui-layout__section ui-layout__section--primary">
         <div class="ui-layout__item">
			<form action="{{ route('students.index') }}/{{ $students->student_id }}" accept-charset="UTF-8" method="POST">
				@csrf
				<div class="Polaris-Card">
				   <div class="Polaris-Card__Section">
					  <div class="ui-card__section">
						 <div class="ui-stack ui-stack--wrap">
							<div class="Polaris-Stack__Item">
							   <span class="printavo_settings_user-avatar user-avatar user-avatar--style-4" style="background-color: #{{ $students->avatar_background_color }}">
								   <span class="user-avatar__initials">
									{{ $students->avatar_initials }}
								   </span>
									@if( isset( $avatar_url_small ) )
										<img alt="" class="gravatar gravatar--size-thumb" src="{{ $avatar_url_small }}">
									@endif
							   </span>
							</div>
							<div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
							   <div class="Polaris-AccountConnection__Content">
								  <h2>{{ $students->student_name }}</h2>
								  <div><span class="Polaris-TextStyle--variationSubdued">{{ $students->campus }}</span></div>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="Polaris-Card__Section">
					  <div class="ui-card__section takeover_meta_table clearfix">
						 <div class="home-takeover-data__wrap">
							<figcaption class="home-takeover-data__label">
							   Students total sales
							</figcaption>
							<figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
							   <span id="job_amount" class="home-takeover-data__number ui-title-bar__title">${{ $students->total_sales }}</span>
							</figure>
						 </div>
						 <div class="home-takeover-data__wrap">
							<figcaption class="home-takeover-data__label">
							   Total commision
							</figcaption>
							<figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
							   <span id="total_commision" class="home-takeover-data__number ui-title-bar__title">${{ $students->total_commision }}</span>
							</figure>
						 </div>
						 <div class="home-takeover-data__wrap">
							<figcaption class="home-takeover-data__label">
							   Total orders
							</figcaption>
							<figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
							   <span class="home-takeover-data__number ui-title-bar__title">{{ $students->total_order }}</span>
							</figure>
						 </div>
					  </div>
				   </div>
				</div>
				<div class="Polaris-Card">
					<div class="Polaris-Card__Section">
						<div class="Polaris-Labelled__LabelWrapper">
							<div class="Polaris-Label">
								<label for="campus" class="next-label">Select Campus</label>
							</div>
						</div>
						<div class="Polaris-SettingAction">
						  <div class="Polaris-SettingAction__Setting">
							 <div class="Polaris-Stack">
							   <div class="Polaris-Stack__Item Polaris-Stack__Item--fill campus_select_item">
									<div class="Polaris-Select">
										<select id="Select2" name="campus" class="Polaris-Select__Input" aria-invalid="false">
											@foreach( $campus_list as $campus_name )
												<option value="{{ $campus_name }}" @if( $students->campus == $campus_name ) selected @endif >{{ $campus_name }}</option>
											@endforeach
										</select>
										<div class="Polaris-Select__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span></div>
										<div class="Polaris-Select__Backdrop"></div>
									</div>
							   </div>
							 </div>
						  </div>
						</div>
					</div>
				</div>
				 
				<div class="Polaris-SettingAction__Action setting_save_btn">
					<input type="hidden" name="_method" value="put" />
					<input type="submit" name="setting-form" class="Polaris-Button Polaris-Button--primary" value="save">
				</div> 
			</form>
		  </div>
	   </div>
   </div>
</div>

@endsection

@section('Script-content')

@endsection
