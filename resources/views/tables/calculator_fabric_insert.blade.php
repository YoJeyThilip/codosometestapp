@extends('layouts.dashboard')

@section('dashboard-content')
<div class="wrap product_calculator_details">
	<h1 class="product_calculator_header">Product Calculator Settings</h1>

	<h2 class="nav-tab-wrapper product_calculator_tables">
		<a href="?tab=common_items" class="nav-tab">Common Items</a>  
		<a href="?tab=commission_rates" class="nav-tab">Commission rates</a>
		<a href="?tab=addons" class="nav-tab">Addons</a>
		<a href="?tab=calculator_fabric" class="nav-tab">Calculator fabric</a>
	</h2>  
</div>
<div class="calculator_fabric_table edit_tables">
<form action="{{ route('tables') }}?tab=calculator_fabric" method="post">
	@csrf
	<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
		<tbody>
			@foreach( $calculator_fabric as $fabric )	
				@if( $calculator_fabric_insert_id == $fabric->id )
					<tr>
						<td>ID</td>
						<td><input type="text"  name="id" value=""></td>
							<td><input type="hidden"  name="table_name" value="calculator_fabric"></td>
					</tr>
					<tr>
						<td>front</td>
						<td><input type="text" name="front"  value=""></td>
					</tr>
					<tr> 
						<td>Light Fabric Non Online 25</td>
						<td><input type="text" name="light_fabric_non_online_25"  value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Non Online 50</td>
						<td><input type="text" name="light_fabric_non_online_50"  value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Non Online 100</td>
						<td><input type="text" name="light_fabric_non_online_100"  value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Non Online 150</td>
						<td><input type="text" name="light_fabric_non_online_150"  value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Non Online 25</td>
						<td><input type="text" name="dark_fabric_non_online_25"  value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Non Online 50</td>
						<td><input type="text" name="dark_fabric_non_online_50"  value=""></td> 
					</tr>
					<tr>
						<td>Dark Fabric Non Online 100</td>
						<td><input type="text" name="dark_fabric_non_online_100"  value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Non Online 150</td>
						<td><input type="text" name="dark_fabric_non_online_150"  value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Online 25</td>
						<td><input type="text" name="light_fabric_online_25"  value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Online 50</td>
						<td><input type="text" name="light_fabric_online_50"  value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Online 100</td>
						<td><input type="text" name="light_fabric_online_100" value=""></td>
					</tr>
					<tr>
						<td>Light Fabric Online 150</td>
						<td><input type="text" name="light_fabric_online_150"  value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 25</td>
						<td><input type="text" name="dark_fabric_online_25"  value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 50</td>
						<td><input type="text" name="dark_fabric_online_50"  value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 100</td>
						<td><input type="text" name="dark_fabric_online_100" value=""></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 150</td>		
						<td><input type="text" name="dark_fabric_online_150"  value=""></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="update"></td>
					</tr>
				@endif
			@endforeach
		
		</tbody>
	</table>
</form>
</div>
				
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