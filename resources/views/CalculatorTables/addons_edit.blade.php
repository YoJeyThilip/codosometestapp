@extends('layouts.dashboard')

@section('dashboard-content')

<div class="product_calculator_details_container">

	<div class="addons_table edit_tables">
		
		<div class="Polaris-Page">
		
			<div class="Polaris-Page__Header product_calculator_details_header">
			
			    <div class="Polaris-Page__Title">
			  
					<h1 class="product_calculator_header Polaris-DisplayText Polaris-DisplayText--sizeLarge">Addons Table Item</h1>
				 
				</div>
			  
			</div>
				
			
		
			<div class="Polaris-Card">
			
				<div class="Polaris-Card__Section">
				
					<form action="{{ route('calculator-tables') }}?tab=addons" method="post">
						@csrf
						@foreach( $addons as $addon )	
							@if( $addons_edit_id == $addon->id )
								<div class="Polaris-FormLayout">
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldIdLabel" for="TextField_id" class="Polaris-Label__Text">ID</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_id" readonly  name="id" class="Polaris-TextField__Input" value="{{$addon->id}}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldBrandLabel" for="TextField_brand" class="Polaris-Label__Text">Add on</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_brand" class="Polaris-TextField__Input" type="text"  name="add_on" value="{{ $addon->add_on }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Prize</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Product" class="Polaris-TextField__Input" type="text"  name="prize" value="{{ $addon->prize }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								  <div class="Polaris-FormLayout__Item product_calculator_submit_button">
									<button type="submit" class="Polaris-Button Polaris-Button--primary submit_button">
										<span class="Polaris-Button__Content">
											<span>Update</span>
										</span>
									</button>
									<input type="hidden"  name="table_name" value="addons">
								  </div>
								</div>
								
							@endif
						@endforeach
				
					</form>
					
				</div>
				
			</div>
			
		</div>
			
	</div>
	
</div>
	
@endsection