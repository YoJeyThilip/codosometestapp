@extends('layouts.dashboard')

@section('dashboard-content')
<div class="wrap product_calculator_details">
	<h1 class="product_calculator_title">Product Calculator Settings</h1>

	<h2 class="nav-tab-wrapper product_calculator_tables">
		<a href="?tab=common_items" class="nav-tab @if( isset( $current_page ) and  $current_page == 'common_items' ) nav-tab-active @endif">Common Items</a>  
		<a href="?tab=commission_rates" class="nav-tab @if( isset( $current_page ) and  $current_page == 'commission_rates' ) nav-tab-active @endif">Commission rates</a>
		<a href="?tab=addons" class="nav-tab @if( isset( $current_page ) and  $current_page == 'addons' ) nav-tab-active @endif">Addons</a>
		<a href="?tab=calculator_fabric" class="nav-tab @if( isset( $current_page ) and  $current_page == 'calculator_fabric' ) nav-tab-active @endif">Calculator fabric</a>
	</h2>  
</div>

<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
	<thead>
		<tr role="row">
			<th class="sorting_asc" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Color Name: activate to sort column ascending" style="width: 207px;">Id</th>
			<th class="sorting_asc" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Color Name: activate to sort column ascending" style="width: 207px;">Control</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Control: activate to sort column ascending" style="width: 144px;">Add On</th>
			<th class="sorting" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Colour Type: activate to sort column ascending" style="width: 210px;">Prize</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $addons as $addon )	
		<tr role="row" class="odd">
					
			<td class="sorting_1">{{ $addon->id }}</td>
			<td>
																		   
				<a class="fa fa-pencil" href="?edit=addons&id={{$addon->id}}"></a>
				
				<form method="post" style="display: inline-block;">
				@csrf
					<input name="delete" type="hidden" id="id" value="{{$addon->id}}">
					<input name="delete_id" type="hidden" id="id" value="addons">
					<button class="fa fa-trash-o" type="submit" style="background-color: transparent;border: 0;color: blue;"></button>
				</form>
			
		    </td>
			<td>
				{{ $addon->add_on }}
			</td>
			<td>{{ $addon->prize }}</td>
					
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
	
		    
	// custom toolbar
	$("div.dt-toolbar .create-button-colors-style").html('<form action="{{ route("tables") }}?insert=common_items" method="post">@csrf<input type="hidden" name="insert_page" value="common_items"><input type="submit" class="insert_form" value="Create New"></form>'); 
});
</script>

@endsection