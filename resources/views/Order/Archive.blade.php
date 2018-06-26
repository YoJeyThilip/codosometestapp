@extends('layouts.dashboard')

@section('dashboard-content')
<div class="ui-layout ui-layout--full-width">
   <div class="ui-layout__sections">
      <div class="ui-layout__section">
         <div class="ui-layout__item">
            <section class="ui-card">
               <div class="has-bulk-actions">
                  <div>
                     <div class="next-tab__container ">
                        <ul class="next-tab__list" role="tablist" data-has-next-tab-controller="true">
                           <li role="presentation"><a class="next-tab next-tab--is-active" tabindex="0" aria-controls="NextTabPanel-1-all" aria-selected="true" aria-label="All" href="{{ route('orders.index') }}">All Orders</a></li>
                        </ul>
                     </div>
                     <div class="next-card__section next-card__section--no-bottom-spacing">
                        <div class="obj-filter hide-when-printing table-filter-container">
                           <div class="next-input-wrapper">
								<label class="next-label"></label>
								<form  id="query-search-form" action="{{ route('orders.index') }}" accept-charset="UTF-8" method="get" >
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
										   <input type="text" name="query" id="query" placeholder="Search orders" bind="query" class="next-input next-input--invisible" value="@if( isset($query) ){{ $query }}@endif">
										</div>
									 </div>
									</div>
								</form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="orders-results" refresh="orders">
                     <div class="ui-card__section">
                        <div class="ui-type-container">
                           <div class="table-wrapper">
                              <table class="table-hover expanded">
                                 <thead>
                                    <tr>
                                       <th class="is-sortable @if( $sortby == 'order_id' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('orders.index') }}?sortby=order_id&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Invoice</a>
										</span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'due_date' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('orders.index') }}?sortby=due_date&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> @if( $user_role > 3 ) Customer Due date @else Due date @endif </a>
										<span>
                                       </th>
									   @if( $user_role <= 3 )
										   <th class="is-sortable @if( $sortby == 'nic_name' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
											<span>
											  <a href="{{ route('orders.index') }}?sortby=nic_name&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif">Nice name</a>
											</span>
										   </th>
									   @endif
                                       <th class="is-sortable @if( $sortby == 'customer' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('orders.index') }}?sortby=customer&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Customer</a>
										</span>
                                       </th>
									   @if( $user_role <= 3 )
										   <th class="is-sortable @if( $sortby == 'order_status' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
											<span>
											  <a href="{{ route('orders.index') }}?sortby=order_status&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif">Order status</a>
											</span>
										   </th>
									   @endif
                                       <th class="is-sortable @if( $sortby == 'payment_status' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('orders.index') }}?sortby=payment_status&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Payment status</a>
										</span>
                                       </th>
                                       <th class="is-sortable type--right @if( $sortby == 'order_total' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('orders.index') }}?sortby=order_total&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Job Amount</a>
										</span>
                                       </th>
									   @if( $user_role <= 3 )
										   <th class="is-sortable type--right @if( $sortby == 'commision' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
											<span>
											  <a href="{{ route('orders.index') }}?sortby=commision&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif">Commision</a>
											</span>
										   </th>
									   @else
										   <th class="is-sortable type--right @if( $sortby == 'student_name' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
											<span>
											  <a href="{{ route('orders.index') }}?sortby=student_name&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Student</a>
											</span>
										   </th>
										   <th class="is-sortable type--right @if( $sortby == 'campus' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
											<span>
											  <a href="{{ route('orders.index') }}?sortby=campus&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Campus</a>
											</span>
										   </th>
									   @endif
                                       <th class="is-sortable @if( $sortby == 'payed' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('orders.index') }}?sortby=payed&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Payed</a>
										</span>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
									@if(  $printavo_status == "connected" )
										@foreach( $orders as $order )
											<tr class="ui-nested-link-container ">
											   <td class="no-wrap">
												  <a href="{{ route('orders.index') }}/{{ $order->order_id }}">#{{ $order->order_id }}</a>
											   </td>
											   <td class="no-wrap next-table__cell--full-width-when-condensed">
												  <span title="{{ date( 'j/n/Y', strtotime( $order->due_date ) ) }}">{{ date("j/n/Y", strtotime($order->due_date)) }}</span>
											   </td>
											   @if( $user_role <= 3 )
												   <td class="no-wrap next-table__cell--full-width-when-condensed">
													  <span>{{ $order->nic_name }}</span>
												   </td>
											   @endif
											   <td class="no-wrap">
												  <span>{{ $order->customer }}</span>
											   </td>
											   @if( $user_role <= 3 )
												   <td class="no-wrap">
													<span class="badge" style="background-color:{{ $order->order_status_color }}; color:@if( $order->order_status_color == '#000000' ) #ffffff @else #000000 @endif ">
														{{ $order->order_status }}
													</span>
												   </td>
											   @endif
											   <td class="no-wrap">
												<span class="badge @if( $order->payment_status == 'Paid' ) badge--status-success @elseif( $order->payment_status == 'Unpaid' ) badge--status-attention @endif ">
													{{ $order->payment_status }}
												</span>
											   </td>
											   <td class="type--right total next-table__cell--top-right-when-condensed">{{ number_format( floatval($order->order_total ) ,2 ) }}</td>
											   
											   @if( $user_role <= 3 )
												   <td class="type--right total next-table__cell--top-right-when-condensed">{{ $order->commision }}%</td>
											   @else
												   <td class="type--right total next-table__cell--top-right-when-condensed">{{ $order->student_name }}</td>
												   <td class="type--right total next-table__cell--top-right-when-condensed">{{ $order->campus }}</td>
											   @endif
											   
											   <td class="no-wrap">
												  <span class="badge @if( $order->payed == 'Yes' ) badge--status-success @elseif( $order->payed == 'no' ) badge--status-attention @endif ">
													{{ $order->payed }} 
												  </span>
											   </td>
											</tr>
										@endforeach
									@endif
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					 @if( ( $printavo_status == "connected"  ) && ( $prev_page > 0 || $next_page > 0 ) )
						 <div class="next-card__section">
							<div class="next-grid next-grid--no-padding next-grid--center-aligned">
							   <div class="next-grid__cell next-grid__cell--no-flex">
								  <ul id="pagination-links" class="segmented" refresh-always="">
									 <li>
										<a class="btn js-keep-open js-pagination-link js-prev-btn tooltip tooltip-bottom @if( $prev_page <= 0 ) disabled @endif" href="{{ route('orders.index') }}?page={{ $prev_page }}@if( isset($query) )&query={{ $query }}@endif()@if( isset($sortby) )&sortby={{ $sortby }}&sortway={{$sortway}} @endif">
										   <span class="tooltip-container">
										   <span class="tooltip-label">Previous (J)</span>
										   </span>
										   <svg role="img" class="next-icon next-icon--rotate-270 next-icon--size-16"">
											  <title id="next-arrow-detailed-14983953e5614db36092527558992c06-title">previous</title>
											  <use xlink:href="#next-arrow-detailed"></use>
										   </svg>
										</a>
									 </li>
									 <li>
										<a class="btn js-keep-open js-pagination-link js-next-btn tooltip tooltip-bottom @if( $next_page <= 0 ) disabled @endif" href="{{ route('orders.index') }}?page={{ $next_page }}@if( isset($query) )&query={{ $query }}@endif()@if( isset($sortby) )&sortby={{ $sortby }}&sortway={{$sortway}} @endif">
										   <span class="tooltip-container">
										   <span class="tooltip-label">Next (K)</span>
										   </span>
										   <svg role="img" class="next-icon next-icon--rotate-90 next-icon--size-16"">
											  <title id="next-arrow-detailed-34ca3ba58f42fcd031ad9eff39bc51c4-title">next</title>
											  <use xlink:href="#next-arrow-detailed"></use>
										   </svg>
										</a>
									 </li>
								  </ul>
							   </div>
							</div>
						 </div>
					    @endif
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
		/*
		$(' form#query-search-form #query').change(function(){
			
			var form = $(this).parents('form');
			
			var form_data = form.serializeArray();
			
			form_data.push(
					{
						'name'	: 'action',
						'value' : 'orders_search',
					}
			);
			
			console.log(form_data);
			
			$.ajax({
				
				type: 'POST',
				
				url: form.attr('action'),
				
				data: form_data,
				
				success: function (response) {
					console.log(response);
				}
			});
			
		});
		*/

	</script>
@endsection