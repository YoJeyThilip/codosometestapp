@extends('layouts.dashboard')

@section('dashboard-content')
<div class="wrap">
	<h1>Product Calculator Settings</h1>

	<h2 class="nav-tab-wrapper">
		<a href="?page=product_calculator&tab=product_details" class="nav-tab">Product Details</a>  
		<a href="?page=product_calculator&tab=colors_details" class="nav-tab">Colors Details</a>
		<a href="?page=product_calculator&tab=colors_definition" class="nav-tab">Colors Definition</a>
		<a href="?page=product_calculator&tab=extras" class="nav-tab">Extras</a>
	</h2>  
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

<style>
	h2.nav-tab-wrapper {
		border-bottom: 1px solid #ccc;
		margin: 0;
		padding-top: 9px;
		padding-bottom: 0;
		line-height: inherit;
	}
	
	h2.nav-tab-wrapper a {
		float: left;
		border: 1px solid #ccc;
		border-bottom: none;
		margin-left: .5em;
		padding: 5px 10px;
		font-size: 14px;
		line-height: 24px;
		background: #e5e5e5;
		color: #555;
	}
	
	.nav-tab:focus, .nav-tab:hover {
		background-color: #fff;
		color: #444;
	}
	
	.wrap h1 {
		padding-top: 20px;
		padding-left: 20px;
	}
		
</style>
