@extends('layouts.dashboard')

@section('dashboard-content')

	

<script>
var calculator_fabric = '{!! html_entity_decode(str_replace("'",'/',$calculator_fabric)) !!}';
var common_items = '{!! html_entity_decode(str_replace("'",'/',$common_items)) !!}';
var commission_rates = '{!! html_entity_decode(str_replace("'",'/',$commission_rates)) !!}';
var addons = '{!! html_entity_decode(str_replace("'",'/',$addons)) !!}';
 var calculator_fabric_arr = JSON.parse(calculator_fabric);
 var common_items_arr = JSON.parse(common_items);
 var commission_rates_arr = JSON.parse(commission_rates);
 var addons_arr = JSON.parse(addons);

$( document ).ready(function() {
	$('#Select_brand').on('change',function(){
		var products = [];
		var select_brand =$('#Select_brand').val();
		$.each(common_items_arr, function( index, value ) {
			if(value['brand'] == select_brand){
				products[index] = value['product'];
			}
		});
		
		var $el = $("#Select_Type");
		$el.empty();
		$.each(products, function(key,value) {
			if(value != null){	
				$el.append( $("<option></option>").attr("value", value).html(value) );
			}	
		});
	}).change();
	$('.calculator_section select').on('change',function(){
		var commission_prize_total;
		var prize_one;
		var prize_two;
		var prize_three;
		var total_prize;
		var commission_rates_ammount;
		var select_online_store =$('#Select_online_store').val();
		var select_brand =$('#Select_brand').val();
		var select_Type =$('#Select_Type').val();
		var select_qty =$('#Select_qty').val();
		var arr = select_qty.split("-");
		var select_qty_slice = arr.splice(0,1)
		var select_Color =$('#Select_Color').val();
		var select_Front =$('#Select_Front').val();
		var select_Back =$('#Select_Back').val();

		var select_add_ons =$('#Select_Add_ons').val();
		
		$.each(calculator_fabric_arr, function( index, value ) {
			if(select_qty_slice == 12){
						select_qty_slice = 25;
				}
				
			if((value['front'] == select_Front) && (value['back'] == select_Back)){
				if(select_online_store == "yes"){
					prize_one = value[select_Color+'_fabric_online_'+select_qty_slice];
					
					//console.log(select_Color+'_fabric_online_'+select_qty_slice);
				}else{
					prize_one = value[select_Color+'_fabric_non_online_'+select_qty_slice];
					
					//console.log(select_Color+'_fabric_non_online_'+select_qty_slice);
				}
			
			}	
				
			
		});
		
		$.each(common_items_arr, function( index, value ) {
			if((value['product'] == select_Type) && (value['brand'] == select_brand)){
				if(select_online_store == "yes"){
					prize_two = value['online_store'];
				}else{
					prize_two =  value['non_online_store'];
					
				}
			}
			
		});
		$.each(addons_arr, function( index, value ) {
			if(value['add_on'] == select_add_ons){
				prize_three =  value['prize'];
			}
			
		});
			total_prize = prize_one + prize_two + prize_three;
			
		$.each(commission_rates_arr, function( index, value ) {
			if(value['shirts'] == select_qty){
				commission_rates_ammount =  value['rate'];
			}
			commission_prize_total = total_prize % commission_rates_ammount;
			
		
		});
			$('.shirt_cost').text('$'+total_prize.toFixed(2));
			$('.commission_rate').text(commission_rates_ammount+'%');
			$('.commission_per_item').text('$'+commission_prize_total.toFixed(2));
	}).change();
});
</script>
		
<div class="ui-layout ui-layout--full-width">
	<div class="ui-layout__sections">
		<div class="ui-layout__section">
			<div class="ui-layout__item">
				<div class="Polaris-Card campus_cumission_calculator">
				  <div class="Polaris-Card__Header">
					<h2 class="Polaris-Heading">Price Calculator</h2>
				  </div>
				  <div class="Polaris-Card__Section calculator_section">
					<div class="Polaris-FormLayout">
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_online_store" class="Polaris-Label__Text">Online store</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_online_store" class="Polaris-Select__Input" aria-invalid="false">
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_brand" class="Polaris-Label__Text">Brand</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_brand" class="Polaris-Select__Input" aria-invalid="false">
								@foreach($brand_names as $brand_name)
									<option value="{{ $brand_name }}">{{ $brand_name }}</option>
								@endforeach
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_Type" class="Polaris-Label__Text">Type</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_Type" class="Polaris-Select__Input" aria-invalid="false">
				
								@foreach($product_names as $product_name)
									<option value="{{ $product_name->product }}">{{ $product_name->product }}</option>
								@endforeach
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_qty" class="Polaris-Label__Text">qty</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_qty" class="Polaris-Select__Input" aria-invalid="false">
								
								@foreach($quantities as $quantity)
									<option value="{{ $quantity->shirts }}">{{ $quantity->shirts }}</option>
								@endforeach
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_Color" class="Polaris-Label__Text">Color</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_Color" class="Polaris-Select__Input" aria-invalid="false">
									<option value="dark">Dark</option>
									<option value="light">Light</option>
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_Front" class="Polaris-Label__Text">Front</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_Front" class="Polaris-Select__Input" aria-invalid="false">
								@foreach($fronts as $front)
									<option value="{{ $front }}">{{ $front }}</option>
								@endforeach
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_Back" class="Polaris-Label__Text">Back</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_Back" class="Polaris-Select__Input" aria-invalid="false">
									@foreach($backs as $back)
										<option value="{{ $back }}">{{ $back }}</option>
									@endforeach
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item">
							<div class="">
							  <div class="Polaris-Labelled__LabelWrapper">
								<div class="Polaris-Label"><label for="Select_Add_ons" class="Polaris-Label__Text">Add ons</label></div>
							  </div>
							  <div class="Polaris-Select">
								<select id="Select_Add_ons" class="Polaris-Select__Input" aria-invalid="false">
								@foreach($add_ons as $add_on)
									<option value="{{ $add_on->add_on }}">{{ $add_on->add_on }}</option>
								@endforeach
								</select>
								<div class="Polaris-Select__Icon">
									<span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span>
								</div>
								<div class="Polaris-Select__Backdrop">
								</div>
							  </div>
							</div>
						</div>
						<div class="Polaris-FormLayout__Item clearfix">
							<div class="col-md-6">
								<div class="form-group">
								Shirt Cost
								</div>
							</div>
							<div class="col-md-6">
								<div class="shirt_cost"></div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								Commission
								</div>
							</div>
							<div class="col-md-6">
								<div class="commission_rate"></div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								Commission per item
								</div>
							</div>
							<div class="col-md-6">
								<div class="commission_per_item"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('Script-content')
@endsection