@extends('layouts.dashboard')

@section('dashboard-content')
<header class="ui-title-bar-container">
	<div class="ui-title-bar ui-title-bar--separator">
		<div class="ui-title-bar__navigation">
			<div class="ui-breadcrumbs">
				<a href="/" class="ui-button ui-button--transparent ui-breadcrumb">
				<svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false"> 
				<use xlink:href="#chevron-left-thinner"></use> </svg>
				<span class="ui-breadcrumb__item">Settings</span>
				</a>
			</div>
		</div>
		<div class="ui-title-bar__main-group">
			<div class="ui-title-bar__heading-group">
			<span class="ui-title-bar__icon">
			<svg aria-hidden="true" focusable="false" class="next-icon next-icon--color-slate-lighter next-icon--size-20"> 
				<use xlink:href="#next-settings"></use> </svg></span>
				<h1 class="ui-title-bar__title">General</h1>
			</div>
		</div>
	</div>
</header>
<section class="ui-annotated-section-container">
	<div class="ui-annotated-section">
	  <div class="ui-annotated-section__annotation">
		  <div class="ui-annotated-section__title">
				<h2 class="ui-heading">Printavo API</h2>
			</div>
			<div class="ui-annotated-section__description">
				<p>This API is used to access information in your Printavo account.</p>
			</div>
		</div>
		<div class="ui-annotated-section__content">
			<div class="next-card">
			  <div class="section-content">
				<div class="next-card__section">
					<div class="ui-form__section">
						<div class="next-input-wrapper">
							<label class="next-label" for="shop_name">Email</label>
							<input class="next-input" size="30" type="text" value="" name="shop[name]" id="shop_name">
						</div>
						<div class="next-input-wrapper">
							<label class="next-label" for="shop_name">Password</label>
							<input class="next-input" size="30" type="text" value="" name="shop[name]" id="shop_name">
						</div>
						</div>        
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="ui-page-actions">
	<div class="ui-page-actions__container">
		<div class="ui-page-actions__actions ui-page-actions__actions--primary">
			<div class="ui-page-actions__button-group">
				<button class="ui-button ui-button--primary js-btn-primary js-btn-loadable btn-primary has-loading" type="submit" name="commit" disabled="disabled">Save</button>
			</div>
		</div>
	</div>
</div>
@endsection