
@extends('layouts.dashboard')

@section('dashboard-content')

<div class="product_calculator_details_container">

	<div class="commission_rates_table edit_tables insert_data">
		
		<div class="Polaris-Page">
		
			<div class="Polaris-Page__Header product_calculator_details_header">
			
			    <div class="Polaris-Page__Title">
			  
					<h1 class="product_calculator_header Polaris-DisplayText Polaris-DisplayText--sizeLarge">Commission Rates Table Item</h1>
				 
				</div>
			  
			</div>
				
			
		
			<div class="Polaris-Card">
			
				<div class="Polaris-Card__Section">
				
					<form action="{{ route('calculator-tables') }}?tab=commission_rates" method="post">
						@csrf
						<div class="Polaris-FormLayout">
						  
						  <div class="Polaris-FormLayout__Item"> 
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldBrandLabel" for="TextField_brand" class="Polaris-Label__Text">Shirts</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text"  name="shirts" value="" required>
								<input name="insert_table" type="hidden" id="id" value="commission_rates">
							  </div>
							</div>
						  </div>
						  <div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label">
									<label id="TextFieldProductLabel" for="TextField_Product" class="Polaris-Label__Text">Fabric</label>
								</div>
							  </div>
							  <div class="Polaris-TextField">
								<input type="text"  name="rate" value="" required>
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