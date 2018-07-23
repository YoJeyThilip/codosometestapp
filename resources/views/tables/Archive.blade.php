
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
								
								<!-- widget div-->
								<div>
									<div class="widget-body no-padding">
										<div class="row">
										
											
												<div class="col-xs-12">
													<div class="table-responsive">
														
														<table id="dt_basic" class="table table-striped table-hover" width="100%" >
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Control</th>
																	<th>Style</th>
																	<th>Product Images</th>
																	<th>Price</th>
																	
																</tr>
															</thead>
															<tbody>
																																
															</tbody>
														</table>
														
														
													</div>
												</div>
											</div>
					
											
										</div>
										</table>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				</article>
				
				<script src="<?php echo(plugins_url( 'js/jquery-ui.min.js', __FILE__ )); ?>"></script>
				<script src="<?php echo(plugins_url( 'js/datatables/jquery.dataTables.min.js', __FILE__ )); ?>"></script>
				<script src="<?php echo(plugins_url( 'js/datatables/dataTables.colVis.min.js', __FILE__ )); ?>"></script>
				<script src="<?php echo(plugins_url( 'js/datatables/dataTables.tableTools.min.js', __FILE__ )); ?>"></script>
				<script src="<?php echo(plugins_url( 'js/datatables/dataTables.bootstrap.min.js', __FILE__ )); ?>"></script>
				<script src="<?php echo(plugins_url( 'js/datatables/datatables.responsive.min.js', __FILE__ )); ?>"></script>


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
	
		    
	// custom toolbar
	$("div.dt-toolbar .create-button-colors-style").html('<a href="<?php echo(admin_url( "admin.php?page=add_style")); ?>" class="button button-primary">Create new</a>');
});
</script>
