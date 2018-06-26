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
                           <li role="presentation"><a class="next-tab next-tab--is-active" tabindex="0" aria-controls="NextTabPanel-1-all" aria-selected="true" aria-label="All" href="{{ route('students.index') }}">All students</a></li>
                        </ul>
                     </div>
                     <div class="next-card__section next-card__section--no-bottom-spacing">
                        <div class="obj-filter hide-when-printing table-filter-container">
                           <div class="next-input-wrapper">
								<label class="next-label"></label>
								<form  id="query-search-form" action="{{ route('students.index') }}" accept-charset="UTF-8" method="get" >
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
										   <input type="text" name="query" id="query" placeholder="Search Students" bind="query" class="next-input next-input--invisible" value="@if( isset($query) ){{ $query }}@endif">
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
                              <table class="table-hover expanded">
                                 <thead>
                                    <tr>
                                       <th>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'student_name' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('students.index') }}?sortby=student_name&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Student name </a>
										<span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'campus' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('students.index') }}?sortby=campus&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> Campus </a>
										<span>
                                       </th>
                                       <th class="is-sortable @if( $sortby == 'connected' ) @if( $sortway == 'ASC' ) sorted-desc @else sorted-asc @endif @endif">
										<span>
                                          <a href="{{ route('students.index') }}?sortby=connected&sortway=@if( $sortway == 'ASC' ){{ 'DESC' }}@else{{ 'ASC' }}@endif()@if( isset($query) )&query={{ $query }}@endif"> connection test </a>
										<span>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody context="bulkOperations">
									@if(  $printavo_status == "connected" )
										@foreach( $students as $student )
											<tr class="ui-nested-link-container ">
											   <td class="no-wrap">
												  <a href="{{ route('students.index') }}/{{ $student->student_id }}">
													<span class="printavo_settings_user-avatar user-avatar user-avatar--style-4" style="background-color: #{{ $student->avatar_background_color }}">
														<span class="user-avatar__initials">
															{{ $student->avatar_initials }}
														</span>
														@if( $student->avatar_url_small != '' )
															<img alt="" class="gravatar gravatar--size-thumb" src="{{ $student->avatar_url_small }}">
														@endif
													</span>
												  </a>
											   </td>
											   <td class="no-wrap next-table__cell--full-width-when-condensed">
												  <span>{{ $student->student_name }}</span>
											   </td>
											   <td class="no-wrap">
												  <span>{{ $student->campus }}</span>
											   </td>
											   <td class="no-wrap">
												  <span class="badge @if( $student->connected == 'not yet' ) badge--status-attention @else badge--status-success @endif "> {{ $student->connected }} </span>
											   </td>
											</tr>
										@endforeach
									@endif
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					 @if( ( $printavo_status == "connected"  ) && ( $prev_page != '' || $next_page != '' ) )
						 <div class="next-card__section">
							<div class="next-grid next-grid--no-padding next-grid--center-aligned">
							   <div class="next-grid__cell next-grid__cell--no-flex">
								  <ul id="pagination-links" class="segmented" refresh-always="">
									 <li>
										<a class="btn js-keep-open js-pagination-link js-prev-btn tooltip tooltip-bottom @if( $prev_page == '' ) disabled @endif" href="{{ route('students.index') }}?page={{ $prev_page }}">
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
										<a class="btn js-keep-open js-pagination-link js-next-btn tooltip tooltip-bottom @if( $next_page == '' ) disabled @endif" href="{{ route('students.index') }}?page={{ $next_page }}">
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
	</script>
@endsection