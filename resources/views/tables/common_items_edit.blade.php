@extends('layouts.dashboard')

@section('dashboard-content')

<div class="common_items_table edit_tables">

<h1 class="product_calculator_header">Common Items Table Item</h1>

<form action="{{ route('tables') }}?tab=common_items" method="post">
	@csrf
	<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
		<thead>
		</thead>
		<tbody>
				@foreach( $common_items as $common_item )	
					@if( $common_items_edit_id == $common_item->id )
						<tr>
							<td>ID</td>
							<td><input type="text"  name="id" value="{{$common_item->id}}" disabled></td>
							<td><input type="hidden"  name="table_name" value="common_items"></td>
						</tr>
						<tr>
							<td>Brand</td>
							<td><input type="text"  name="brand" value="{{ $common_item->brand }}"></td>
						</tr>
						<tr>
							<td>Product</td>
							<td><input type="text"  name="product" value="{{ $common_item->product }}"></td>
						</tr>
						<tr>
							<td>Cost</td>
							<td><input type="text" name="cost"  value="{{ $common_item->cost }}"></td>
						</tr>
						<tr>
							<td>Non online Store</td>
							<td><input type="text"  name="non_online_store" value="{{ $common_item->non_online_store }}"></td>
						</tr>
						<tr>
							<td>Online Store</td>
							<td><input type="text" name="online_store" value="{{ $common_item->online_store }}"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="update" name="update" value="Update"></td>
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