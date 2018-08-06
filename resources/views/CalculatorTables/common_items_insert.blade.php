
@extends('layouts.dashboard')

@section('dashboard-content')

<div class="product_calculator_details_container">

	<div class="common_items_table edit_tables insert_data">
		
		<div class="Polaris-Page">
		
			<div class="Polaris-Page__Header product_calculator_details_header">
			
			    <div class="Polaris-Page__Title">
			  
					<h1 class="product_calculator_header Polaris-DisplayText Polaris-DisplayText--sizeLarge">Common Items Table Item</h1>
				 
				</div>
			  
			</div>
				
			
		
			<div class="Polaris-Card">
			
				<div class="Polaris-Card__Section">
				
					<form action="{{ route('calculator-tables') }}?tab=common_items" method="post">
						@csrf
						<div class="Polaris-FormLayout">
						  
						  <div class="Polaris-FormLayout__Item"> 
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldBrandLabel" for="TextField_brand" class="Polaris-Label__Text">Brand</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text"  name="brand" value="" required>
								<input name="insert_table" type="hidden" id="id" value="common_items">
							  </div>
							</div>
						  </div>
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Product</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text"  name="product" value="" required>
							  </div>
							</div>
						  </div>
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Cost</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text" name="cost"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Non online Store</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text"  name="non_online_store" value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldCostLabel" for="TextField_Cost" class="Polaris-Label__Text">Online Store</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text"  name="online_store" value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item product_calculator_submit_button">
							<button type="submit" class="Polaris-Button Polaris-Button--primary submit_button">
								<span class="Polaris-Button__Content">
									<span>Save</span>
								</span>
							</button>
						  </div>
						</div>
				
					</form>
					
				</div>
				
			</div>
			
		</div>
			
	</div>
	
</div>
	
@endsection