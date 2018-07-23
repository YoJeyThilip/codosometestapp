@extends('layouts.dashboard')

@section('dashboard-content')

<div class="ui-layout ui-layout--full-width">
   <div class="ui-layout__sections">
      <div class="ui-layout__section">
         <div class="ui-layout__item">
		 
		    <div class="reports_page_header clearfix">
				<div class="reports_heading"><h1>Reports</h1></div>
				<div class="reports_submit_button_container"><button class="reports_submit_button">Prepare For Payment</button></div>
			</div>
			<form id="reports_to_total_payment" action="" method="POST">
				@csrf
				<input type="hidden" name="selected_student_report_and_orders" value="" class="selected_student_report_and_orders">
			</form>
		 
            <section class="ui-card">
               <div class="has-bulk-actions">
                  <div>
                     <div class="next-tab__container ">
                        <ul class="next-tab__list" role="tablist" data-has-next-tab-controller="true">
                           <li role="presentation"><a class="next-tab next-tab--is-active" tabindex="0" aria-controls="NextTabPanel-1-all" aria-selected="true" aria-label="All" href="{{ route('reports') }}">All reports</a></li>
                        </ul>
                     </div>
                     <div class="next-card__section next-card__section--no-bottom-spacing">
                        <div class="obj-filter hide-when-printing table-filter-container">
                           <div class="next-input-wrapper">
								<label class="next-label"></label>
								<form  id="query-search-form" action="{{ route('reports') }}" accept-charset="UTF-8" method="get" >
									<div class="next-field__connected-wrapper">
									 <div class="next-field--connected--no-flex">
										<div class="ui-popover__container">
										   <input class="ui-button" type="submit" value="Search">
										   <span></span>
										</div>
									 </div>
									 <div class="next-form next-form--full-width next-field--connected--no-border-radius">
										<label class="next-label helper--visually-hidden" for="query">Query</label>
										<div class="next-input--stylized next-field--connected">
										   <span class="next-input__add-on next-input__add-on--before">
											  <svg aria-hidden="true" focusable="false" class="next-icon next-icon--color-slate-lightest next-icon--size-16">
												 <use xlink:href="#next-search-reverse"></use>
											  </svg>
										   </span>
										   <input type="text" name="query" id="query" placeholder="Search reports" bind="query" class="next-input next-input--invisible" value="@if( isset($query) ){{ $query }}@endif">
										</div>
									 </div>
									</div>
								</form>
                           </div>
                        </div>
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
										<span>
											<input id="select_all_student_orders" type="checkbox">
										</span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'student_name' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('reports') }}?sortby=student_name&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Manager Name </a>
										<span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'campus' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('reports') }}?sortby=campus&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Campus Name </a>
										<span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'total_orders' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('reports') }}?sortby=total_orders&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Total Orders </a>
										<span>
                                       </th>
									   <th class="is-sortable @if( $sortby == 'total_payment' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('reports') }}?sortby=total_payment&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Total to be paid </a>
										<span>
                                       </th>
									   <th class="is-sortable @if( $sortby == 'payment' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('reports') }}?sortby=payment&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Payment </a>
										<span>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody context="bulkOperations">
									@if(  $printavo_status == "connected" )
										@foreach( $students as $student )
											<tr class="ui-nested-link-container ">
											
											   <td class="no-wrap reports_table_content_initial">
													<span> 
														<input class="selected_student_report" type="checkbox" name="selected_student_order" value="{{ $student->student_id }}"> 
													</span> 
													
													<span class="cover_content_initial_round">
														<span class="printavo_settings_user-avatar user-avatar user-avatar--style-4" style="background-color: #{{ $student->avatar_background_color }}">
															<span class="user-avatar__initials">
																{{ $student->avatar_initials }}
															</span>
															@if( $student->avatar_url_small != '' )
																<img alt="" class="gravatar gravatar--size-thumb" src="{{ $student->avatar_url_small }}">
															@endif
														</span>
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
																				<span> <input class="selected_student_order" type="checkbox" name="selected_student_order" value="{{ $order->order_id }}"> </span> 
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
               </div>
            </section>
			<section class="button_center">
				<div class="ui-type-container">
					<button id="load_more_students">Load More</button>
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
	
	$('.ui-layout__section table.students_reports_table>tbody').on('change', '.selected_student_report', function(){
		
		if( $(this).prop("checked") == true ){
			
			$(this).parents('.ui-nested-link-container ').find( '.selected_student_order' ).prop( 'checked',true );
			
		}
		else {
		
			$(this).parents('.ui-nested-link-container ').find( '.selected_student_order' ).prop( 'checked',false ); 
			
		}
		
	});
	
	$('.ui-layout__section table.students_reports_table>tbody').on('change', '.selected_student_order', function(){
		
		var selected = false;
		var selected_student_order = $(this);
		selected_student_order.parents('.ui-nested-link-container').find( '.selected_student_order' ).each(function(){
			if( $(this).prop("checked") == true ){
				selected = true;
			}
		}); 
		
		if( selected ){
			
			selected_student_order.parents('.ui-nested-link-container').find( '.selected_student_report' ).prop( 'checked',true );
			
		}
		else {
		
			selected_student_order.parents('.ui-nested-link-container ').find( '.selected_student_report' ).prop( 'checked',false ); 
			
		}
		
	});
	
	$('.ui-layout__section table.students_reports_table').on('change', '#select_all_student_orders', function(){
		
		console.log($(this));
		console.log($(this).prop("checked"));
		
		if( $(this).prop("checked") == true ){
			
			$(this).parents('.ui-layout__section table.students_reports_table').find( '.selected_student_report' ).prop( 'checked',true ).change();
			
		}
		else {
		
			$(this).parents('.ui-layout__section table.students_reports_table').find( '.selected_student_report' ).prop( 'checked',false ).change(); 
			
		}
		
	});
	
	$('.reports_submit_button').click( function(){
		
		var student_id_and_order_id = {};		
		
		$( 'body .selected_student_order:checked' ).each(function(key){
			
			var student_id = $(this).parents('.ui-nested-link-container').find( '.selected_student_report' ).val();
			
			if( student_id_and_order_id[student_id] == undefined ){
				
				student_id_and_order_id[student_id] = [];
				
			}
			
			student_id_and_order_id[student_id].push( $(this).val() );
			
		});
		
		$('.selected_student_report_and_orders').val(JSON.stringify(student_id_and_order_id)); 
		
		$('#reports_to_total_payment').submit();
		
	});
	
	var next_page = 2;
	
	$('.button_center #load_more_students').click( function(){
		
		var button = $(this);
		
		button.addClass('loading');
		
		$.ajax({
			
			type: 'POST',
			
			url: "{{ route('ajax') }}",
			
			headers:{
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			
			data: {
				"action" :'reports',
				"page"	 :next_page
			},
			
			success: function (response) {
				var objresponse = JSON.parse(response);
				var output = '';
				$.each( objresponse, function( key, student ){
					output += '<tr class="ui-nested-link-container">'+
								   '<td class="no-wrap reports_table_content_initial">'+
									  '<span> <input class="selected_student_report" type="checkbox" name="selected_student_order" value="'+ student.student_id +'"> </span> '+
										'<span class="cover_content_initial_round">'+
											'<span class="printavo_settings_user-avatar user-avatar user-avatar--style-4" style="background-color: #'+ student.avatar_background_color +'">'+
												'<span class="user-avatar__initials">'+
													student.avatar_initials +
												'</span>';
												if( student.avatar_url_small ){
													output += '<img alt="" class="gravatar gravatar--size-thumb" src="'+ student.avatar_url_small +'">';
												}
											output += '</span>'+
										'</span>'+
								   '</td>'+
								   
								   '<td class="no-wrap next-table__cell--full-width-when-condensed reports_table_contents">'+
									  '<span>'+ student.student_name +'</span>'+
								   '</td>'+
								   
								   '<td class="no-wrap reports_table_contents">';
										if( student.campus ){
											output += '<span>'+ student.campus +'</span>';
										}
								   output += '</td>'+
								   
								   '<td class="no-wrap reports_table_contents order_archive">'+
									  '<span class="report_table_open">'+
										  '<span class=""> '+ student.order_count; if( student.order_count == 1 ){ output += ' Order' }else{ output += ' Orders' } output += '</span> ';
											if( student.order_count != 0 ){
											  output += '<span class="orders_dropdown_option">'+
													'<i class="fa fa-chevron-down" aria-hidden="true"></i> '+
											  '</span>';
											}
									  output += '</span>';
									   if( student.orders.length != 0 ){
										   output += '<table class="orders_list">'+
												'<tbody>'+
													'<thead>'+
														'<tr>'+
															'<th></th>'+
															'<th>Invoice</th>'+
															'<th>Customer due date</th>'+
															'<th>Quantity</th>'+
															'<th>Commission</th>'+
															'<th>Bonus</th>'+
															'<th>to be paid</th>'+
															'<th></th>'+
														'</tr>'+
													'</thead>';
														$.each( student.orders, function( key, order ){
															output += '<tr>'+
																'<td>'+
																	'<span> <input class="selected_student_order" type="checkbox" name="selected_student_order" value="'+ order.order_id +'"> </span> '+
																'</td>'+
															
																'<td>'+
																	'<a href="{{ route('orders.index') }}/'+ order.order_id +'"><span> #'+ order.invoice_no +'</span> '+
																'</td>'+
																
																'<td>'+
																	'<span title="'+ order.due_date +'">'+ order.due_date +'</span>'+
																'</td>'+
																
																'<td>'+
																	'<span>'+ order.total_quantity +'</span>'+
																'</td>'+
																
																'<td>'+
																	'<span>$ '+ order.commision_in_price +'</span>'+
																'</td>'+
																
																'<td>'+
																	'<span>$ '+ order.user_bonus +'</span>'+
																'</td>'+
																
																'<td>'+
																	'<span>$ '+ order.users_bonus_and_commision +'</span>'+
																'</td>'+
																'<td>'+
																	'<span class="badge ';  if( order.payed == "No" ){ output += 'badge--status-attention' }else{ output += 'badge--status-success' } output += '">'; 
																	if( order.payed == "No" ){ output += 'Unpaid' }else{ output += 'Paid' }
																	output += '</span>'+
																'</td>'+
																
															'</tr>';
														});
												output += '</tbody>'+
											'</table>';
									   }
								    output += '</td>'+
								   
									'<td class="no-wrap reports_table_contents">'+
									  '<span class="">$ '+ parseFloat( student.total_payment ).toFixed(2) +'</span>'+
								   '</td>'+
								   
									'<td class="no-wrap reports_table_contents">'+
									  '<span class="badge '; if( student.payment == "Unpaid" ){ output += 'badge--status-attention' }else{ output += 'badge--status-success' } output += '">' + student.payment + '</span>'+
								   '</td>'+
								   
								'</tr>'; 
				});
				
				$('.ui-layout__section table.students_reports_table>tbody').append(output);
				button.removeClass('loading');
				next_page++;
			}
		});
		
	});
	
	
	
	</script>
@endsection