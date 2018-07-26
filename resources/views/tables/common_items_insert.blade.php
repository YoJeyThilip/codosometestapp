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
<div class="common_items_table edit_tables">
<form action="{{ route('tables') }}?tab=common_items" method="post">
	@csrf
	<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
		<thead>
		</thead>
		<tbody>
			<tr>
				<td>ID</td>
				<td><input type="text"  name="id" value=""></td>
				<td><input type="hidden"  name="table_name" value="common_items"></td>
			</tr>
			<tr>
				<td>Brand</td>
				<td><input type="text"  name="brand" value=""></td>
			</tr>
			<tr>
				<td>Product</td>
				<td><input type="text"  name="product" value=""></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="cost"  value=""></td>
			</tr>
			<tr>
				<td>Non online Store</td>
				<td><input type="text"  name="non_online_store" value=""></td>
			</tr>
			<tr>
				<td>Online Store</td>
				<td><input type="text" name="online_store" value=""></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="update"></td>
			</tr>
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