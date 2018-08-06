
@extends('layouts.dashboard')

@section('dashboard-content')

<div class="product_calculator_details_container">

	<div class="calculator_fabric_table edit_tables insert_data">
		
		<div class="Polaris-Page">
		
			<div class="Polaris-Page__Header product_calculator_details_header">
			
			    <div class="Polaris-Page__Title">
			  
					<h1 class="product_calculator_header Polaris-DisplayText Polaris-DisplayText--sizeLarge">Addons Table Item</h1>
				 
				</div>
			  
			</div>
				
			
		
			<div class="Polaris-Card">
			
				<div class="Polaris-Card__Section">
				
					<form action="{{ route('calculator-tables') }}?tab=calculator_fabric" method="post">
						@csrf
						<div class="Polaris-FormLayout">
						  
						  <div class="Polaris-FormLayout__Item"> 
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldBrandLabel" for="TextField_brand" class="Polaris-Label__Text">front</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text" name="front"  value="" required>
								<input name="insert_table" type="hidden" id="id" value="calculator_fabric">
							  </div>
							</div>
						  </div>
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">back</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text" name="back"  value="" required>
							  </div>
							</div>
						  </div>
						   <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Non Online 25</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_non_online_25"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Non Online 50</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_non_online_50"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Non Online 100</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_non_online_100"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Non Online 150</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_non_online_150"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Non Online 25</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_non_online_25"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Non Online 50</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_non_online_50"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Non Online 100</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_non_online_100"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Non Online 150</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_non_online_150"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Online 25</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_online_25"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Online 50</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_online_50"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Online 100</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_online_100"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Light Fabric Online 150</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="light_fabric_online_150"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Online 25</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_online_25"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Online 50</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_online_50"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Online 100</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_online_100"  value="" required>
							  </div>
							</div>
						  </div>
						  
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Dark Fabric Online 150</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="number" name="dark_fabric_online_150"  value="" required>
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