@extends('layouts.dashboard')

@section('dashboard-content')

<div class="commission_rates_table edit_tables">

<h1 class="product_calculator_header">Commission Rates Table Item</h1>

<form action="{{ route('tables') }}?tab=commission_rates" method="post">
	@csrf
	<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
		
		<tr>
			<td>Shirts</td>
			<td><input type="text"  name="shirts" value="" required>
				<input name="insert_table" type="hidden" id="id" value="commission_rates"></td>
		</tr>
		<tr>
			<td>Fabric</td>
			<td><input type="text"  name="rate" value="" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  class="Save" name="Save" value="Save"></td>
		</tr>
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