@extends('layouts.dashboard')

@section('dashboard-content')

<div class="Polaris-Page ui-layout--full-width">
	<div class="Polaris-Page__Header">
		<div class="Polaris-Page__Title">
			<h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Resources</h1>
		</div>
		<div class="Polaris-Page__Actions"></div>
	</div>
	<div class="Polaris-Card__Section">
		{!! $resource_content !!}
	</div>
</div>

@endsection

@section('Script-content')
@endsection