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
		@foreach( $commission_rates as $rate )	
			@if( $commission_rates_edit_id == $rate->id )
				<tr>
					<td>ID</td>
					<td>{{$fabric->id}}</td>
				</tr>
				<tr>
					<td>front</td>
					<td>{{$fabric->front}}</td>
				</tr>
				<tr>
					<td>Light Fabric Non Online 25</td>
					<td>{{$fabric->light_fabric_non_online_25}}</td>
				</tr>
				<tr>
					<td>Light Fabric Non Online 50</td>
					<td>{{$fabric->light_fabric_non_online_50}}</td>
				</tr>
				<tr>
					<td>Light Fabric Non Online 100</td>
					<td>{{$fabric->light_fabric_non_online_100}}</td>
				</tr>
				<tr>
					<td>Light Fabric Non Online 150</td>
					<td>{{$fabric->light_fabric_non_online_150}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Non Online 25</td>
					<td>{{$fabric->dark_fabric_non_online_25}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Non Online 50</td>
					<td>{{$fabric->dark_fabric_non_online_50}}</td> 
				</tr>
				<tr>
					<td>Dark Fabric Non Online 100</td>
					<td>{{$fabric->dark_fabric_non_online_100}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Non Online 150</td>
					<td>{{$fabric->dark_fabric_non_online_150}}</td>
				</tr>
				<tr>
					<td>Light Fabric Online 25</td>
					<td>{{$fabric->light_fabric_online_25}}</td>
				</tr>
				<tr>
					<td>Light Fabric Online 50</td>
					<td>{{$fabric->light_fabric_online_50}}</td>
				</tr>
				<tr>
					<td>Light Fabric Online 100</td>
					<td>{{$fabric->light_fabric_online_100}}</td>
				</tr>
				<tr>
					<td>Light Fabric Online 150</td>
					<td>{{$fabric->light_fabric_online_150}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Online 25</td>
					<td>{{$fabric->dark_fabric_online_25}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Online 50</td>
					<td>{{$fabric->dark_fabric_online_50}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Online 100</td>
					<td>{{$fabric->dark_fabric_online_100}}</td>
				</tr>
				<tr>
					<td>Dark Fabric Online 150</td>		
					<td>{{$fabric->dark_fabric_online_150}}</td>
				</tr>
			@endif
		@endforeach
</table>
				
@endsection


<script>
jQuery(document).ready(function() {
	var responsiveHelper_dt_basic = undefined;
	
	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};
				
	jQuery('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-3'f><'col-xs-12 col-sm-3 create-button-colors-style'><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper(jQuery('#dt_basic'), breakpointDefinition);
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
