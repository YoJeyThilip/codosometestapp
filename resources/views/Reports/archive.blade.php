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
                           <li role="presentation"><a class="next-tab next-tab--is-active" tabindex="0" aria-controls="NextTabPanel-1-all" aria-selected="true" aria-label="All" href="{{ route('all_reports') }}">All Reports</a></li>
                        </ul>
                     </div>
                     <div class="next-card__section next-card__section--no-bottom-spacing">
                        <div class="obj-filter hide-when-printing table-filter-container">
                           <div class="next-input-wrapper">
								<label class="next-label"></label>
								<form  id="query-search-form" action="{{ route('all_reports') }}" accept-charset="UTF-8" method="get" >
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
                  <div id="reports-results">
                     <div class="ui-card__section">
                        <div class="ui-type-container">
                           <div class="table-wrapper">
                              <table class="table-hover expanded">
                                 <thead>
                                    <tr>
                                       <th>
										<span>
											<input id="select_all_reports" type="checkbox">
										</span>
									   </th>
                                       <th class="is-sortable @if( $sortby == 'report_no' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('all_reports') }}?sortby=report_no&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Invoice</a>
										</span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'payment_date' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('all_reports') }}?sortby=payment_date&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Payment Date</a>
										<span>
                                       </th>
                                       <th class="is-sortable type--right @if( $sortby == 'order_amount' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('all_reports') }}?sortby=order_amount&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Order Amount</a>
										</span>
                                       </th>
                                       <th class="is-sortable type--right @if( $sortby == 'paid_amount' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('all_reports') }}?sortby=paid_amount&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif">Paid Amount</a>
										</span>
                                       </th>
                                       <th>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
									@if(  $printavo_status == "connected" )
										@foreach( $reports as $report )
											<tr class="ui-nested-link-container ">
												<td>
													<span> <input class="selected_reports" type="checkbox" name="selected_reports" value="{{ $report->report_no }}"> </span> 
												</td>
												<td class="no-wrap">
												  #{{ $report->report_no }}
												</td>
												<td class="no-wrap next-table__cell--full-width-when-condensed">
												  <span title="{{ date( 'j/n/Y', strtotime( $report->payment_date ) ) }}">{{ date("j/n/Y", strtotime(str_replace('/', '-', $report->payment_date))) }}</span>
												</td>
												<td class="type--right total next-table__cell--top-right-when-condensed">{{ number_format( floatval($report->order_amount ) ,2 ) }}</td>
												<td class="type--right total next-table__cell--top-right-when-condensed">{{ number_format( floatval($report->paid_amount ) ,2 ) }}</td>											   
												<td class="type--right total next-table__cell--top-right-when-condensed download_csv"><a href="#" data-json='{{ json_encode($report->report_sum) }}' data-report_id="{{ $report->report_no }}" >Download report</a></td>											   
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
										<a class="btn js-keep-open js-pagination-link js-prev-btn tooltip tooltip-bottom @if( $prev_page <= 0 ) disabled @endif" href="{{ route('all_reports') }}?page={{ $prev_page }}@if( isset($query) )&query={{ $query }}@endif()@if( isset($sortby) )&sortby={{ $sortby }}&sortway={{$sortway}} @endif">
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
										<a class="btn js-keep-open js-pagination-link js-next-btn tooltip tooltip-bottom @if( $next_page <= 0 ) disabled @endif" href="{{ route('all_reports') }}?page={{ $next_page }}@if( isset($query) )&query={{ $query }}@endif()@if( isset($sortby) )&sortby={{ $sortby }}&sortway={{$sortway}} @endif">
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
				  
<div class="all_reports_commison_footer">
	<div class="reports_payment_footer_action_btn">
		<button>Download PDF</button>
	</div>
</div>
@endsection

@section('Script-content')
	<script>
		$('.download_csv a').click(function(){
			
			var rows = $(this).data('json');
			var report_id = $(this).data('report_id');
			var csvContent = "data:text/csv;charset=utf-8,";
			
			// Use first element to choose the keys and the order
			var keys = Object.keys(rows[Object.keys(rows)[0]]);
			// Build header
			csvContent += keys.join(",") + "\r\n";
			
			$.each( rows, function( index, rowArray ){
				var row = '';
				$.each(rowArray,function( index, item ){
					row += item+",";
				})
			   csvContent += row + "\r\n";
			}); 
			var encodedUri = encodeURI(csvContent);
			var link = document.createElement("a");
			link.setAttribute("href", encodedUri);
			link.setAttribute("download", report_id + "-reports.csv");
			link.innerHTML= "Click Here to download";
			document.body.appendChild(link); // Required for FF

			link.click(); // This will download the data file named "my_data.csv".
			
		});
		
		
		$('table thead #select_all_reports').on('change', function(){
			
			if( $(this).prop("checked") == true ){
				
				$(this).parents('table').find( '.selected_reports' ).prop( 'checked',true );
				
			}
			else {
			
				$(this).parents('table').find( '.selected_reports' ).prop( 'checked',false ); 
				
			}
			
		});
		
		$(".all_reports_commison_footer button").click(function(e){
			
			e.preventDefault();
			
			var report_id = [];

			if( $( 'body .selected_reports:checked' ).length != 0 ){
			
				$( 'body .selected_reports:checked' ).each(function(key){
					
					rows = $(this).parents('.ui-nested-link-container').find('.download_csv a').data('json');
					
					$.each(rows , function(key, row){
						report_id = report_id.concat(row);
					});
					
				});
				
				var csvContent = "data:text/csv;charset=utf-8,";
				
				// Use first element to choose the keys and the order
				var keys = Object.keys(report_id[Object.keys(report_id)[0]]);
				// Build header
				csvContent += keys.join(",") + "\r\n";
				
				$.each( report_id, function( index, rowArray ){
					var row = '';
					$.each(rowArray,function( index, item ){
						row += item+",";
					})
				   csvContent += row + "\r\n";
				}); 
				var encodedUri = encodeURI(csvContent);
				var link = document.createElement("a");
				link.setAttribute("href", encodedUri);
				link.setAttribute("download", "collection-reports.csv");
				link.innerHTML= "Click Here to download";
				document.body.appendChild(link); // Required for FF

				link.click(); // This will download the data file named "my_data.csv".
			
			}
			
		});
	
	</script>
	
@endsection