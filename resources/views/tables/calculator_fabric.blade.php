@extends('layouts.dashboard')

@section('dashboard-content')
<div class="wrap product_calculator_details">
	<h1 class="product_calculator_header">Product Calculator Settings</h1>

	<h2 class="nav-tab-wrapper product_calculator_tables">
		<a href="?page=product_calculator&tab=common_items" class="nav-tab">Common Items</a>  
		<a href="?page=product_calculator&tab=commission_rates" class="nav-tab">Commission rates</a>
		<a href="?page=product_calculator&tab=addons" class="nav-tab">Addons</a>
		<a href="?page=product_calculator&tab=calculator_fabric" class="nav-tab">Calculator fabric</a>
	</h2>  
</div>
<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
	<thead>
		<tr role="row">
			<th class="sorting_asc" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Color Name: activate to sort column ascending" style="width: 207px;">Id</th>
			<th class="sorting_asc" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Color Name: activate to sort column ascending" style="width: 207px;">Control</th>
			<th class="sorting_asc" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Color Name: activate to sort column ascending" style="width: 207px;">Front</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Control: activate to sort column ascending" style="width: 144px;">Light Fabric Non Online 25</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Light Fabric Non Online 50</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Light Fabric Non Online 100</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Light Fabric Non Online 150</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Non Online 25</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Non Online 50</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Non Online 100</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Non Online 150</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">light Fabric Online 25</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">light Fabric Online 50</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">light Fabric Online 100</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">light Fabric Online 150</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Online 25</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Online 50</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Online 100</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Dark Fabric Online 150</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $calculator_fabric as $fabric )	
			<tr role="row" class="odd">
						
				<td>{{$fabric->id}}</td>
				<td>
																		   
					<a class="fa fa-pencil" href="#"></a>
					
					<form method="post" style="display: inline-block;">
						<input name="id" type="hidden" id="id" value="1">
						<input name="type" type="hidden" id="type" value="delete">
						<button class="fa fa-trash-o" type="submit" style="background-color: transparent;border: 0;color: blue;"></button>
					</form>
				
				</td>
				<td>{{$fabric->front}}</td>
				<td>{{$fabric->back}}</td>
				<td>{{$fabric->light_fabric_non_online_25}}</td>
				<td>{{$fabric->light_fabric_non_online_50}}</td>
				<td>{{$fabric->light_fabric_non_online_100}}</td>
				<td>{{$fabric->light_fabric_non_online_150}}</td>
				<td>{{$fabric->dark_fabric_non_online_25}}</td>
				<td>{{$fabric->dark_fabric_non_online_50}}</td>
				<td>{{$fabric->dark_fabric_non_online_100}}</td>
				<td>{{$fabric->dark_fabric_non_online_150}}</td>
				<td>{{$fabric->light_fabric_online_25}}</td>
				<td>{{$fabric->light_fabric_online_50}}</td>
				<td>{{$fabric->light_fabric_online_100}}</td>
				<td>{{$fabric->light_fabric_online_150}}</td>
				<td>{{$fabric->dark_fabric_online_25}}</td>
				<td>{{$fabric->dark_fabric_online_50}}</td>
				<td>{{$fabric->dark_fabric_online_100}}</td>
				<td>{{$fabric->dark_fabric_online_150}}</td>
						
			</tr>
		@endforeach
	
	</tbody>
</table>
				
@endsection

@section('Script-content')
<script>
$(document).ready(function() {
	var responsiveHelper_dt_basic = undefined;
	
	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};
				
	$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-3'f><'col-xs-12 col-sm-3 create-button-colors-style'><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});
	
});
</script>

@endsection

<style>
	h2.nav-tab-wrapper {
		border-bottom: 1px solid #ccc;
		margin: 0;
		padding-top: 9px;
		padding-bottom: 0;
		line-height: inherit;
	}
	
	h2.product_calculator_tables a {
		float: left;
		border: 1px solid #ccc;
		border-bottom: none;
		margin-left: .5em;
		padding: 5px 10px;
		font-size: 14px;
		line-height: 24px;
		background: #e5e5e5;
		color: #555;
		text-decoration: none;
	}
	
	h2.product_calculator_tables a:focus, h2.product_calculator_tables a:hover {
		background-color: #fff;
		color: #444;
	}
	
	.product_calculator_details h1 {
		padding-top: 20px;
		padding-left: 20px;
	}
		
</style>
