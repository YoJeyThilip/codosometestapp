@extends('layouts.dashboard')

@section('dashboard-content')
<div class="Polaris-Page ui-layout--full-width">
   <div class="Polaris-Page__Header">
      <div class="Polaris-Page__Title">
         <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Edit page</h1>
      </div>
      <div class="Polaris-Page__Actions"></div>
   </div>

   <form accept-charset="UTF-8" method="post">
	  @csrf
      <div class="Polaris-Page__Content">
		<div class="Polaris-Layout">
		  <div class="Polaris-Layout__Section">
			<div class="Polaris-Card">
			  <div class="Polaris-Card__Header">
				<h2 class="Polaris-Heading">Body</h2>
			  </div>
			  <div class="Polaris-Card__Section">
				<textarea class="tinymce_editor" name="resource_content">@if( isset( $resource_content ) ){!! $resource_content !!}@endif</textarea>
			  </div>
			</div>
		  </div>
		</div>
		<div class="Polaris-PageActions">
		  <div class="Polaris-Stack Polaris-Stack--spacingTight Polaris-Stack--distributionEqualSpacing">
			<div class="Polaris-Stack__Item">
			</div>
			<div class="Polaris-Stack__Item">
				<input type="submit" value="Save" class="Polaris-Button Polaris-Button--primary">
			</div>
		  </div>
		</div>
      </div>
   </form>
</div>
@endsection

@section('Script-content')

	<script src="{{ secure_asset('tinymce/tinymce.min.js') }}"></script>
	
	<script>
		tinymce.init({ 
			  selector:'.tinymce_editor',
			  height: 500,
			  theme: 'modern',
			  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
			  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
			  image_advtab: true,
			  templates: [
				{ title: 'Test template 1', content: 'Test 1' },
				{ title: 'Test template 2', content: 'Test 2' }
			  ],
			  content_css: [
				'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
				'//www.tinymce.com/css/codepen.min.css'
			  ]
		  });
	</script>

@endsection