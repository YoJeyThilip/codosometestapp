@extends('layouts.dashboard')

@section('dashboard-content')

<div class="ui-layout ui-layout--full-width">
   <div class="ui-layout__sections">
      <div class="ui-layout__section">
         <div class="ui-layout__item">
		    <div class="prepare_for_payment_page_header">
				<h1>Prepare For Payment</h1>
			</div>
            <section class="ui-card">
               <div class="has-bulk-actions">
                  <div>
                     <div class="next-tab__container payment_report_title_container">
						<span class="payment_report_title">Payment Report</span>
                     </div>
                  </div>
                  <div>
                     <div class="ui-card__section">
                        <div class="ui-type-container">
                           <div class="table-wrapper">
							  <table class="table-hover expanded students_reports_table">
								 <thead>
									<tr>
									   <th>
									   </th>
									   <th>
										<span>
										  Manager Name
										<span>
									   </th>
									   <th>
										<span>
										  Campus Name
										<span>
									   </th>
									   <th>
										<span>
										  Total Orders
										<span>
									   </th>
									   <th>
										<span>
										  Total to be paid
										<span>
									   </th>
									   <th>
										<span>
										  Payment
										<span>
									   </th>
									</tr>
								 </thead>
								 <tbody context="bulkOperations">
									@if(  $printavo_status == "connected" )
										@foreach( $students as $student )
								
											<tr class="ui-nested-link-container ">
											
											   <td class="no-wrap reports_table_content_initial">
													<span class="printavo_settings_user-avatar user-avatar user-avatar--style-4" style="background-color: #{{ $student->avatar_background_color }}">
														<span class="user-avatar__initials">
															{{ $student->avatar_initials }}
														</span>
														@if( $student->avatar_url_small != '' )
															<img alt="" class="gravatar gravatar--size-thumb" src="{{ $student->avatar_url_small }}">
														@endif
													</span>
											   </td>
											   
											   <td class="no-wrap next-table__cell--full-width-when-condensed reports_table_contents">
												  <span>{{ $student->student_name }}</span>
											   </td>
											   
											   <td class="no-wrap reports_table_contents">
												  <span>{{ $student->campus }}</span>
											   </td>
											   
											   <td class="no-wrap reports_table_contents order_archive">
												  <span class="report_table_open">
													  <span class=""> {{ $student->order_count }} @if( $student->order_count == 1  )Order @else Orders @endif </span> 
													  @if( $student->order_count != 0 )
														  <span class="orders_dropdown_option">
																<i class="fa fa-chevron-down" aria-hidden="true"></i> 
														  </span>
													  @endif
												  </span>
												   @if( sizeof($student->orders) != 0 )
													   <table class="orders_list">
															<tbody>
																<thead>
																	<tr>
																		<th></th>
																		<th>Invoice</th>
																		<th>Customer due date</th>
																		<th>Quantity</th>
																		<th>Commission</th>
																		<th>Bonus</th>
																		<th>To be paid</th>
																		<th></th>
																	</tr>
																</thead>
																	@foreach( $student->orders as $order )
																		<tr>
																			<td>
																				<span> <input class="selected_student_order" type="checkbox" name="selected_student_order" checked value="{{ $order->order_id }}"> </span> 
																			</td>
																		
																			<td>
																				<a href="{{ route('orders.index') }}/{{ $order->order_id }}"><span> #{{ $order->invoice_no }} </span></a>
																			</td>
																			
																			<td>
																				<span title="{{ date( 'j/n/Y', strtotime( $order->due_date ) ) }}">{{ date("j/n/Y", strtotime($order->due_date)) }}</span>
																			</td>
																			
																			<td>
																				<span>{{ $order->total_quantity }}</span>
																			</td>
																			
																			<td>
																				<span>$ {{ $order->commision_in_price }}</span>
																			</td>
																			
																			<td>
																				<span>$ {{ $order->user_bonus }}</span>
																			</td>
																			
																			<td>
																				<span>$ {{ $order->users_bonus_and_commision }}</span>
																			</td>
																			<td>
																				<span class="badge @if( $order->payed == 'No' ) badge--status-attention @else badge--status-success @endif">@if( $order->payed == 'No' ) Unpaid @else Paid @endif</span>
																			</td>
																			
																		</tr>
																	@endforeach
															</tbody>
														</table>
													@endif
											   </td>
											   
												<td class="no-wrap reports_table_contents">
												  <span class="">$ {{ $student->total_payment }} </span>
											   </td>
											   
												<td class="no-wrap reports_table_contents">
												  <span class="badge @if( $student->payment == 'Unpaid' ) badge--status-attention @else badge--status-success @endif "> {{ $student->payment }} </span>
											   </td>
											   
											</tr>
											
										@endforeach
									@endif
								 </tbody>
							  </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="reports_payment_footer">
					 <div class="reports_payment_footer_table">
						<table>
						 <thead>
							<tr>
							   <th>
								Total Commission
							   </th>
							   <th>
								Bonuses
							   </th>
							   <th>
								To pay Amount
							   </th>
							</tr>
						 </thead>
						 <tbody>
							<tr>
							   <td>
								$ {{ $total_commission }}
							   </td>
							   <td>
								$ {{ $total_bonuses }}
							   </td>
							   <td>
								$ {{ $total_job_amount }}
							   </td>
							</tr>
						 </tbody>
						</table>
					 </div>
                     <div class="payment_report_title_container">
						<span class="payment_report_title">Total Payment</span>
                     </div>
                  </div>
                  <div>
                     <div class="reports_payment_footer_action_btn">
					 
					    <form action="{{ route('all_reports') }}" id="complete_report_form" method="post">
							@csrf
							<input id="report_form_orders" type="hidden" name="report_form_orders" >
							<input id="order_amount" type="hidden" name="order_amount" value="{{ $total_job_amount }}">
							<input id="paid_amount" type="hidden" name="paid_amount" value="{{ $total_commission + $total_bonuses }}">
							<input id="complete_report_form_submit" type="submit" value="Marked selected as paid">
						</form>
						
						<button>Download PDF</button>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>

@endsection

@section('Script-content')
	<script>
	
	$('.ui-layout__section table.students_reports_table>tbody').on('click', '.report_table_open', function(){
			
		$(this).parents('.order_archive').toggleClass('orders_table_opened');
		
		var innert_order_table_height = $(this).parents('.order_archive').find('.orders_list').outerHeight(true);
		
		if( $(this).parents('.order_archive').hasClass('orders_table_opened') == true) { 
		
			$(this).parents('.order_archive').find('.orders_dropdown_option').html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
		
			$( this ).parents('.orders_table_opened').css( 'height', innert_order_table_height + ( $(this).parents('.order_archive').height() ) );
			
		}
		else {
		
			$(this).parents('.order_archive').height(''); 
			
			$(this).parents('.order_archive').find('.orders_dropdown_option').html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
		
		}
		
	});
	
	$("#complete_report_form").submit(function(e){
		
		e.preventDefault()
		
		var order_id = [];		
		
		$( 'body .selected_student_order:checked' ).each(function(key){
			
			order_id.push( $(this).val() );
			
		});
		
		$("#report_form_orders").val(JSON.stringify(order_id)); 
		
		$(this).unbind().submit();
		
	});
	</script>
@endsection