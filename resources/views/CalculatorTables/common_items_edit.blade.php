@extends('layouts.dashboard')

@section('dashboard-content')

<div class="product_calculator_details_container">

	<div class="common_items_table edit_tables">
		
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
						@foreach( $common_items as $common_item )	
							@if( $common_items_edit_id == $common_item->id )
								<div class="Polaris-FormLayout">
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldIdLabel" for="TextField_id" class="Polaris-Label__Text">ID</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_id" readonly  name="id" class="Polaris-TextField__Input" value="{{$common_item->id}}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldBrandLabel" for="TextField_brand" class="Polaris-Label__Text">Brand</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_brand" class="Polaris-TextField__Input" type="text"  name="brand" value="{{ $common_item->brand }}">
										<div class="Polaris-TextField__Backdrop"></div>
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
										<input id="TextField_Product" class="Polaris-TextField__Input" type="text"  name="product" value="{{ $common_item->product }}">
										<div class="Polaris-TextField__Backdrop"></div>
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
										<input id="TextField_Cost" class="Polaris-TextField__Input" type="text" name="cost"  value="{{ $common_item->cost }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldNononlineStoreLabel" for="TextField_Non_online_Store" class="Polaris-Label__Text">Non online Store</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Non_online_Store" class="Polaris-TextField__Input" name="non_online_store" value="{{ $common_item->non_online_store }}">
										<div class="Polaris-TextField__Backdrop"></div>
									  </div>
									</div>
								  </div>
								  <div class="Polaris-FormLayout__Item">
									<div class="">
									  <div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="TextFieldOnlineStoreLabel" for="TextField_Online_Store" class="Polaris-Label__Text">Online Store</label>
										</div>
									  </div>
									  <div class="Polaris-TextField">
										<input id="TextField_Online_Store" class="Polaris-TextField__Input" name="online_store" value="{{ $common_item->online_store }}">
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
									<input type="hidden"  name="table_name" value="common_items">
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