@extends('layouts.dashboard')

@section('dashboard-content')
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
																	@foreach( $orders_table_data as $order )
																		<tr class="ui-nested-link-container >
																		   <td class="no-wrap">
																		   
																				<a href="{{ route('orders.index') }}/{{ $order->order_id }}">#{{ $order->invoice_no }}</a>
																				
																			
																		   </td>
																		   <td class="no-wrap next-table__cell--full-width-when-condensed">
																			  <span title="{{ date( 'j/n/Y', strtotime( $order->due_date ) ) }}">{{ date("j/n/Y", strtotime($order->due_date)) }}</span>
																		   </td>
																		   <td class="no-wrap next-table__cell--full-width-when-condensed">
																			  <span>{{ $order->nic_name }}</span>
																		   </td>
																		   <td class="no-wrap">
																			  <span>{{ $order->customer }}</span>
																		   </td>
																		   <td class="no-wrap">
																			<span class="badge" style="background-color:{{ $order->order_status_color }}; color:@if( $order->order_status_color == '#000000' ) #ffffff @else #000000 @endif ">
																				{{ $order->order_status }}
																			</span>
																		   </td>
																		   <td class="no-wrap">
																			<span class="badge @if( $order->payment_status == 'Paid' ) badge--status-success @elseif( $order->payment_status == 'Unpaid' ) badge--status-attention @endif ">
																				{{ $order->payment_status }}
																			</span>
																		   </td>
																		   <td class="type--right total next-table__cell--top-right-when-condensed">{{ number_format( floatval($order->order_total ) ,2 ) }}</td>
																		   
																		   <td class="type--right total next-table__cell--top-right-when-condensed">{{ $order->commision }}%</td>
																			<td class="type--right total next-table__cell--top-right-when-condensed">{{ $order->student_name }}</td>
																		   <td class="type--right total next-table__cell--top-right-when-condensed">{{ $order->campus }}</td>
																		 
																		   <td class="no-wrap">
																			  <span class="badge @if( $order->payed == 'Yes' ) badge--status-success @elseif( $order->payed == 'no' ) badge--status-attention @endif ">
																				{{ $order->payed }} 
																			  </span>
																		   </td>
																		</tr>
																	@endforeach		
															
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
