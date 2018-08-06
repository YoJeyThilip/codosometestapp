
@extends('layouts.dashboard')

@section('dashboard-content')

<div class="product_calculator_details_container">

	<div class="calculator_fabric_table edit_tables">
		
		<div class="Polaris-Page">
		
			<div class="Polaris-Page__Header product_calculator_details_header">
			
			    <div class="Polaris-Page__Title">
			  
					<h1 class="product_calculator_header Polaris-DisplayText Polaris-DisplayText--sizeLarge">Common Items Table Item</h1>
				 
				</div>
			  
			</div>
				
			
		
			<div class="Polaris-Card">
			
				<div class="Polaris-Card__Section">
				
					<form action="{{ route('calculator-tables') }}?tab=calculator_fabric" method="post">
						@csrf
						@foreach( $calculator_fabric as $fabric )	
							@if( $calculator_fabric_edit_id == $fabric->id )
								<div class="Polaris-FormLayout">
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldIdLabel" for="TextField_id" class="Polaris-Label__Text">ID</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_id" readonly  name="id" class="Polaris-TextField__Input" value="{{$fabric->id}}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldBrandLabel" for="TextField_brand" class="Polaris-Label__Text">front</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_brand" class="Polaris-TextField__Input" type="text"  name="front" value="{{ $fabric->front }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Back</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Product" class="Polaris-TextField__Input" type="text"  name="back" value="{{ $fabric->back }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Non Online 25</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_non_online_25"  value="{{ $fabric->light_fabric_non_online_25 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Non Online 50</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_non_online_50"  value="{{ $fabric->light_fabric_non_online_50 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Non Online 100</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_non_online_100"  value="{{ $fabric->light_fabric_non_online_100 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								   <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Non Online 150</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_non_online_150"  value="{{ $fabric->light_fabric_non_online_150 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								   <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Non Online 25</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_non_online_25"  value="{{ $fabric->dark_fabric_non_online_25 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Non Online 50</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_non_online_50"  value="{{ $fabric->dark_fabric_non_online_50 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Non Online 100</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_non_online_100"  value="{{ $fabric->dark_fabric_non_online_100 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								   <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Non Online 150</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_non_online_150"  value="{{ $fabric->dark_fabric_non_online_150 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								   <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Online 25</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_online_25"  value="{{ $fabric->light_fabric_online_25 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Online 50</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_online_50"  value="{{ $fabric->light_fabric_online_50 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Online 100</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_online_100"  value="{{ $fabric->light_fabric_online_100 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Light Fabric Online 150</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="light_fabric_online_150"  value="{{ $fabric->light_fabric_online_150 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Online 25</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_online_25"  value="{{ $fabric->dark_fabric_online_25 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								   <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Online 50</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_online_50"  value="{{ $fabric->dark_fabric_online_50 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								   <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Online 100</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_online_100"  value="{{ $fabric->dark_fabric_online_100 }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Dark Fabric Online 150</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="dark_fabric_online_150"  value="{{ $fabric->dark_fabric_online_150 }}">
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
									<input type="hidden"  name="table_name" value="calculator_fabric">
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