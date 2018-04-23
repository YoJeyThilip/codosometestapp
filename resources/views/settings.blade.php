@extends('layouts.dashboard')

@section('dashboard-content')
<div class="Polaris-Page">
  <div class="Polaris-Page__Header Polaris-Page__Header--hasBreadcrumbs">
    <div class="Polaris-Page__Navigation">
      <nav role="navigation"><a class="Polaris-Breadcrumbs__Breadcrumb" data-polaris-unstyled="true"><span class="Polaris-Breadcrumbs__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><path d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16" fill-rule="evenodd"></path></svg></span></span><span class="Polaris-Breadcrumbs__Content">Settings</span></a></nav>
    </div>
    <div class="Polaris-Page__Title">
      <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">General</h1>
    </div>
    <div class="Polaris-Page__Actions"></div>
  </div>
  <div class="Polaris-Page__Content">
    <div class="Polaris-FormLayout">
  <div class="Polaris-FormLayout__Item">
    <div class="">
      <div class="Polaris-Labelled__LabelWrapper">
        <div class="Polaris-Label"><label id="TextField1Label" for="TextField1" class="Polaris-Label__Text">Store name</label></div>
      </div>
      <div class="Polaris-TextField"><input id="TextField1" class="Polaris-TextField__Input" aria-labelledby="TextField1Label" aria-invalid="false" value="">
        <div class="Polaris-TextField__Backdrop"></div>
      </div>
    </div>
  </div>
  <div class="Polaris-FormLayout__Item">
    <div class="">
      <div class="Polaris-Labelled__LabelWrapper">
        <div class="Polaris-Label"><label id="TextField2Label" for="TextField2" class="Polaris-Label__Text">Account email</label></div>
      </div>
      <div class="Polaris-TextField"><input id="TextField2" class="Polaris-TextField__Input" type="email" aria-labelledby="TextField2Label" aria-invalid="false" value="">
        <div class="Polaris-TextField__Backdrop"></div>
      </div>
    </div>
  </div>
</div>
  </div>
  <button type="button" class="Polaris-Button Polaris-Button--primary"><span class="Polaris-Button__Content"><span>Save theme</span></span></button>
</div>

@endsection