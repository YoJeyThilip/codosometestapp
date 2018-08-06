@extends('layouts.dashboard')

@section('dashboard-content')
<header class="ui-title-bar-container order_single_header">
   <div class="ui-title-bar" id="order-title-bar" data-tg-refresh="order-title-bar">
      <div class="ui-title-bar__navigation">
         <div class="ui-breadcrumbs hide-when-printing">
            <a href="{{ route('orders.index') }}" class="ui-button ui-button--transparent ui-breadcrumb" data-bind-href="Shopify.AdjacentResources.lastSearchURI(this, 'order')">
               <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                  <use xlink:href="#chevron-left-thinner"></use>
               </svg>
               <span class="ui-breadcrumb__item">All Orders</span>
            </a>
         </div>
         <div class="ui-title-bar__pagination">
            <ul class="segmented" define="{adjacent: new Shopify.AdjacentResources(&quot;order&quot;, 386087485494).init(this)}" context="adjacent">
               <li>
                  <a class="btn tooltip tooltip-bottom tooltip-right-align js-prev-btn disabled" bind-class="{disabled: isPrevDisabled()}" track-click="{category: 'Global actions', action: 'previous page', label: 'admin/' + &quot;order&quot; + 's#show pagination'}" href="/admin/orders/386087485494/prev">
                     <span class="tooltip-container">
                     <span class="tooltip-label">Previous (J)</span>
                     </span>
                     <svg role="img" class="next-icon next-icon--rotate-270 next-icon--size-16" aria-labelledby="arrow-detailed-bfd5d8d3a08368e3b75bdebce27e237d-title">
                        <title id="arrow-detailed-bfd5d8d3a08368e3b75bdebce27e237d-title">previous</title>
                        <use xlink:href="#arrow-detailed"></use>
                     </svg>
                  </a>
               </li>
               <li>
                  <a class="btn tooltip tooltip-bottom tooltip-right-align js-next-btn" bind-class="{disabled: isNextDisabled()}" track-click="{category: 'Global actions', action: 'next page', label: 'admin/' + &quot;order&quot; + 's#show pagination'}" href="/admin/orders/385915748406">
                     <span class="tooltip-container">
                     <span class="tooltip-label">Next (K)</span>
                     </span>
                     <svg role="img" class="next-icon next-icon--rotate-90 next-icon--size-16" aria-labelledby="arrow-detailed-3b4f8eae5ab5959a4e69548065753b68-title">
                        <title id="arrow-detailed-3b4f8eae5ab5959a4e69548065753b68-title">next</title>
                        <use xlink:href="#arrow-detailed"></use>
                     </svg>
                  </a>
               </li>
            </ul>
         </div>
      </div>
      <div class="ui-title-bar__main-group">
         <div class="ui-title-bar__heading-group">
            <span class="ui-title-bar__icon">
               <svg aria-hidden="true" focusable="false" class="next-icon next-icon--color-slate-lighter next-icon--size-20">
                  <use xlink:href="#next-orders"></use>
               </svg>
            </span>
            <h1 class="ui-title-bar__title">Order #{{ $order->invoice_no }}</h1>
            <span class="ui-title-bar__metadata">
				{{ date("F j, Y \a\\t h:ia", strtotime( $order->created_at )) }}
            </span>
         </div>
      </div>
      <div class="ui-title-bar__actions-group">
         <div class="ui-title-bar__actions"><button class="ui-button ui-button--primary js-btn-loadable js-btn-primary hide-when-printing btn-primary has-loading" type="submit" name="button" disabled="disabled">Save</button></div>
      </div>
   </div>
   <div class="collapsible-header">
      <div class="collapsible-header__heading"></div>
   </div>
</header>
<div class="ui-layout order_single_content">
   <div class="ui-layout__sections">
      <div class="ui-layout__section ui-layout__section--primary">
         <div class="ui-layout__item">
            <section class="ui-card" id="order_card">
               <header class="ui-card__header">
                  <div class="ui-stack ui-stack--wrap">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <h2 class="ui-title-bar__title">
                           <div class="ui-stack ui-stack--wrap ui-stack--alignment-center">
                              <h2 class="ui-title-bar__title">{{ $order->nic_name }}</h2>
                           </div>
                        </h2>
                     </div>
                     <div class="ui-stack-item">
						<a href="#">
							<button class="ui-button btn--link hide-when-printing" type="button" name="button">Edit</button>
						</a>
                     </div>
                  </div>
               </header>
			   <div class="ui-card__section takeover_meta_table clearfix" >
					<div class="home-takeover-data__wrap">
					   <figcaption class="home-takeover-data__label">
						  Job Amount
					   </figcaption>
					   <figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
						  <span id="job_amount" class="home-takeover-data__number ui-title-bar__title" data-bind="takeover.humanized.totalSales">${{ number_format( $order->order_total ,2 ) }}</span>
					   </figure>
					</div>
					<div class="home-takeover-data__wrap">
					   <figcaption class="home-takeover-data__label">
						  Total commision
					   </figcaption>
					   <figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
						  <span id="total_commision" class="home-takeover-data__number ui-title-bar__title" data-bind="takeover.humanized.totalSales">${{ number_format( (($order->commision/100) * $order->order_total),2 ) }}</span>
					   </figure>
					</div>
					<div class="home-takeover-data__wrap">
					   <figcaption class="home-takeover-data__label">
						  Quantity
					   </figcaption>
					   <figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
							<span class="home-takeover-data__number ui-title-bar__title" data-bind="takeover.humanized.totalSales">{{ $order->total_quantity }}</span>
					   </figure>
					</div>
					<div class="home-takeover-data__wrap">
					   <figcaption class="home-takeover-data__label">
						  Bonus
					   </figcaption>
					   <figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
						  <span id="user_total_bonus" class="home-takeover-data__number ui-title-bar__title" data-bind="takeover.humanized.totalSales">$@if( $splitsheet_value != 'no'  ){{ number_format( ($users_bonus +$other_user_bonus),2 ) }}@else{{ $users_bonus }}@endif</span>
					   </figure>
					</div>
			   </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Customer Due Date
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p class="type--subdued">
							{{ date("F j, Y", strtotime( $order->due_date )) }}
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Client Name
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p class="type--subdued">
							{{ $order->customer }}
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Campus
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p class="type--subdued">
							Vandy
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Customer paid?
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p class="type--subdued">
							 @if( $order->payment_status == false ) No @else Yes @endif 
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Comission Bracket %
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p id="commision_bracket" class="type--subdued">
							{{ $order->commision }}%
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Splitsheet
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p id="splitsheet_value_btm_form" class="type--subdued">
						@if( $splitsheet_value != '') {{ $splitsheet_value }} @else null @endif
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Total commision
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p id="user_commision_btm_form" class="type--subdued">
							${{ number_format( ($order->commision/100) * $order->order_total,2 ) }}
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Total bonus
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p id="user_bonus_btm_form" class="type--subdued">
							@if( $splitsheet_value != 'no'  ) ${{ number_format( $users_bonus + $other_user_bonus ,2 ) }} @else ${{ number_format( $users_bonus ,2 ) }} @endif
						 </p>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section ui-card-section-item" id="order-payment-callout" data-tg-refresh="order-actions">
                  <div class="ui-stack ui-stack--wrap ui-stack--distribution-trailing ui-stack--alignment-center">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <div class="ui-stack ui-stack--alignment-center">
                           <div class="ui-stack-item ui-stack-item--fill">
                              <h3 class="ui-subheading">
								Student paid
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="ui-stack-item">
						 <p id="student_paid_or_not" class="type--subdued">
							{{ $order->payed }}
						 </p>
                     </div>
                  </div>
               </div>
            </section>
         </div>
		<div class="ui-layout__item">
			<div class="comment_section">
			
				<div class="comment_title">
					<h1 class="ui-title-bar__title">Comments</h1>
				</div>
				
				<div class="comment_body">
					@foreach( $comments as $comment )
					
						<div class="cmt_items">
							<span>{{ $comment->user_name }}:</span>{{ $comment->comment }}
						</div>
						
					@endforeach
				</div>
			
				<form method="post" id="new_comment_order">
					@csrf
					<textarea name="comment" id="new_comment_order_ta"></textarea>
					<input type="hidden" name="action" value="new_comment">
					<input type="hidden" name="order_id" value="{{ $order->order_id }}">
					<input type="hidden" name="user_name" value="{{ $avatar_name }}">
					<input type="submit" value="Post">
				</form>
			</div>
		</div>
      </div>
      <div class="ui-layout__section ui-layout__section--secondary" id="order-sidebar" refresh="order-sidebar">
         <div class="ui-layout__item">
            <section class="ui-card" id="customer-card" data-tg-refresh="customer-card">
               <div class="ui-card__section">
                  <div class="ui-type-container">
                     <div class="ui-stack ui-stack--wrap ui-stack--alignment-baseline">
                        <div class="ui-stack-item ui-stack-item--fill">
                           <h3 class="ui-subheading">Commision</h3>
						   <span id="commision_data" class="home-takeover-data__number ui-title-bar__title">{{ $order->commision }}%</span>
                        </div>
						@if( $admin_changed != 'changed' ||  $user_role > 3 )
							<div class="ui-stack-item">
								<button id="edit-order" class="ui-button btn--link hide-when-printing" type="button" name="button">Edit</button>
							</div>
						@endif
                     </div>
                     <div>
                        <div id="commision_split" class="ui-type-container ui-type-container--spacing-extra-tight">
							@if( $splitsheet_value == 'yes'  )
								<P>
									SPLITED 50/50 WITH
								</P>
							@endif
							   <p>
								<button id="btn_user_one_name" class="ui-button customer-email btn--link show-when-printing" type="button" name="button">{{ $order->student_name}} </button>
								@if( $splitsheet_value == 'yes' )
								   @isset($other_user_name)
									  &
									  <button id="btn_other_user_name" class="ui-button customer-email btn--link show-when-printing" type="button" name="button">{{ $other_user_name }}</button>
								   @endisset
								@endif
							   </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ui-card__section">
                  <div id="commision_container" class="ui-type-container">
                     <div class="ui-stack ui-stack--wrap ui-stack--alignment-baseline">
                        <div class="ui-stack-item ui-stack-item--fill">
							<h3 class="ui-subheading">Total Paid</h3>
							<span id="user_total_paid" class="home-takeover-data__number ui-title-bar__title">${{ $total_paid_value }}</span>
							@if( $paid_date != '' )
								<span> ON: {{ date( 'M j,Y', strtotime( str_replace('/', '-', $paid_date) ) ) }}</span>
							@endif
                        </div>
                     </div>
					 
					 <div id="user_one_commision_container"  class="ui-stack ui-stack--wrap ui-stack--alignment-baseline">
						<div class="ui-stack-item ui-stack-item--fill">
						   <h3 id="users_bonus_and_commision" class="ui-subheading">$@if( ( $other_user_bonus != '' && $splitsheet_value != 'no' ) ){{ number_format( floatval($users_bonus_and_commision),2 ) }} @else {{ number_format( $total_commision_value + $users_bonus,2 ) }} @endif To {{ $order->student_name }}</h3>
						   <span id="users_bonus">$@if( ( $other_user_bonus != '' && $splitsheet_value != 'no'  ) ){{ number_format( $total_commision_value/2 , 2 ) }}@else{{ number_format( $total_commision_value , 2 ) }} @endif commision + ${{ $users_bonus }} Bonus</span>
						</div>
					 </div>
					@if( $other_user_bonus != '' && $splitsheet_value != 'no' )
					 <div id="user_two_commision_container" class="ui-stack ui-stack--wrap ui-stack--alignment-baseline">
						<div class="ui-stack-item ui-stack-item--fill">
						   <h3 id="other_user_bonus_and_commision" class="ui-subheading">${{ number_format( floatval($other_user_bonus_and_commision),2 )}} to {{ $other_user_name }}</h3>
						   <span id="other_user_bonus_amount">${{ number_format( ($total_commision_value/2),2 ) }} commision + ${{ $other_user_bonus }} Bonus</span>
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

<div id="dialog" title="Edit Comission">
	<form id="order_edit_form" method="post">
	  @csrf
	   <div class="body address-editable">
		  <div class="ui-form__section">
			<div class="next-input-wrapper">
				<label class="next-label" for="splitsheet">Splitsheet</label>
				<div class="splitsheet_value_cover">
					<select name="splitsheet_value" id="splitsheet" class="next-input">
						<option  @if(  $splitsheet_value == 'yes' ) selected @endif value="yes" >Yes</option>
						<option  @if(  $splitsheet_value == 'no' ) selected @endif value="no"  >No</option>
					</select>
				</div>
			</div>
			@if ( $user_role > 3 )
				<div id="users_bonus" class="next-input-wrapper">
					<label class="next-label" for="users_bonus_value">Users Bonus</label>
					<input class="next-input full-width-select" size="30" type="number" min="1" value="{{ $users_bonus }}" name="users_bonus" id="users_bonus_value"  value="{{ $users_bonus }}">
				</div>
			@endif
			<div id="user_two" @if(  $splitsheet_value == 'no' ) style="display:none" @endif >
				<div class="next-input-wrapper">
					<label class="next-label" for="other_user_name">Other User</label>
					<select name="other_user_id" id="other_user_name" class="next-input">	
						<option value="null" selected disabled>null</option>
						@foreach( $users as $user )
							<option value="{{ $user->student_id }}" @if( $user->student_id == $other_user_id ) selected @endif >{{ $user->student_name }}</option>
						@endforeach
					</select>
				</div>
				@if ( $user_role > 3 )
					<div id="other_user_bonus" class="next-input-wrapper">
						<label class="next-label" for="other_user_bonus_value">Other User Bonus</label>
						<input class="next-input full-width-select" size="30" type="number" min="1" value="{{ $other_user_bonus }}" name="other_user_bonus" id="other_user_bonus_value">
					</div>
				@endif
			</div>
			
			@if ( $user_role > 3 )
			
				<div class="next-input-wrapper">
					<label class="next-label" for="commision">Commision</label>
					<input class="next-input full-width-select" size="30" type="number" min="1" value="{{ $order->commision }}" name="splitsheet_commision" id="commision">
				</div>
				<div class="next-input-wrapper">
				   <label class="next-label next-label--switch" for="student_paid_or_not">Student Paid</label>
				   <input name="student_paid_or_not" type="hidden" value="0">
				   <input class="next-checkbox" type="checkbox" value="Yes"  @if( $order->payed == 'Yes' ) checked="checked" @endif name="student_paid_or_not" id="student_paid_or_not">
				   <span class="next-checkbox--styled">
					  <svg class="next-icon next-icon--size-10 checkmark" aria-hidden="true" focusable="false">
						 <use xlink:href="#next-checkmark-thick"></use>
					  </svg>
				   </span>
				</div>
				
			@endif
			
		  </div>
	   </div>
	</form>
</div>

@endsection

@section('Script-content')
	<script>
			
		$('#other_user_name').selectize();
		
		function save(){
			
			@if ( $user_role > 3 )
				
			var users_name = "{{ $order->student_name}}";
			
			var other_user_name = $( '#other_user_name option:selected' ).html();
			
			var users_bonus_html = $('#users_bonus_value').val();
			
			var other_user_bonus_html = $('#other_user_bonus_value').val();
			
			var user_bonus_total_value = ( parseFloat(users_bonus_html) + parseFloat(other_user_bonus_html) ).toFixed(2) ;
			
			var job_amount = parseFloat( {{ $order->order_total }} ).toFixed(2);
			
			var user_commision = $('#commision').val();
			
			var form_data = $('#order_edit_form').serializeArray();
			
			var total_commision_value = ( user_commision / 100 ) *job_amount;
			
			var users_bonus_and_commision = ( ( total_commision_value / 2 ) + parseFloat(users_bonus_html) ).toFixed(2);
			
			var other_user_bonus_and_commision = ( ( total_commision_value /2) + parseFloat(other_user_bonus_html) ).toFixed(2);
				
			var total_paid_value = ( parseFloat(users_bonus_and_commision) + parseFloat(other_user_bonus_and_commision) ).toFixed(2) ;
			
			var student_paid = $('#student_paid_or_not:checked').val();
			
			form_data.push(
							{
								'name' : 'other_user_name',
								'value' : other_user_name
							},
							{
								'name' : 'users_bonus_and_commision',
								'value' : users_bonus_and_commision
							},
							{
								'name' : 'other_user_bonus_and_commision',
								'value' : other_user_bonus_and_commision
							},
							{
								'name' : 'total_commision_value',
								'value' : total_commision_value
							},
							{
								'name' : 'total_paid_value',
								'value' : total_paid_value
							},
							{
								'name' : 'payed',
								'value' : student_paid
							},
							{
								'name' : 'order_id',
								'value' : '{{ $order->order_id }}'
							},
							{
								'name' : 'action',
								'value' : 'orders_edit'
							}
						);
			
			selected_value = $(' #splitsheet option:selected ').val();
			
			if( selected_value == 'no' ) {
				
				$('#users_bonus').html('$'+( (total_commision_value ).toFixed(2) )+' commision + $'+users_bonus_html+' Bonus');
				
				$('#users_bonus_and_commision').html( ( ( total_commision_value + (parseFloat(users_bonus_html)) ).toFixed(2) )+' TO '+users_name);
			
			}
			
			$.ajax({
				
				type: 'POST',
				
				url: "{{ route('ajax') }}",
				
				data: form_data,
				
				success: function (response) {
					
					var ajax_data = JSON.parse(response);
					
					$('#commision_data').text( ajax_data['splitsheet_commision']+'%');
					
					$('#total_commision').html('$'+( (user_commision/100)*job_amount).toFixed(2) );

					$('#splitsheet_value_btm_form').html(selected_value);
					
					$('#commision_bracket').html(user_commision+'%');
						
					$('#user_commision_btm_form').html('$'+total_commision_value.toFixed(2));
					
					if( student_paid == 'Yes' ){

						$('#student_paid_or_not').html('Yes');

					}
					else{ 

						$('#student_paid_or_not').html('No');

					}
						
					if( ajax_data['splitsheet_value'] == 'yes') {
						
						$('#commision_split').html('<P>SPLITED 50/50 WITH</P><p> <button class="ui-button customer-email btn--link show-when-printing" type="button" name="button">'+users_name+'</button> & <button class="ui-button customer-email btn--link show-when-printing" type="button" name="button">'+other_user_name+'</button> </p> ');
						
						$('#other_user_bonus_amount').html('$'+(( total_commision_value/2 ).toFixed(2) )+' commision + $'+other_user_bonus_html+' Bonus');
						
						$('#user_total_bonus').text('$'+user_bonus_total_value );
						
						$('#users_bonus_and_commision').html('$'+users_bonus_and_commision+' TO '+users_name);
						
						$('#other_user_bonus_and_commision').html('$'+other_user_bonus_and_commision+' TO '+other_user_name);
						
						$('#users_bonus').html('$'+( (total_commision_value/2 ).toFixed(2) )+' commision + $'+users_bonus_html+' Bonus');
						
						$('#user_total_paid').html( '$'+total_paid_value );
						
						$('#user_bonus_btm_form').html('$'+user_bonus_total_value );
						
						if( ( $('#commision_container').find('#user_two_commision_container').length ) == 0 ) {
						
							$('#commision_container').append( '<div id="user_two_commision_container" class="ui-stack ui-stack--wrap ui-stack--alignment-baseline"><div class="ui-stack-item ui-stack-item--fill"><h3 class="ui-subheading">'+other_user_bonus_and_commision+' TO '+other_user_name+'</h3><span id="other_user_bonus">$'+( (total_commision_value/2 ).toFixed(2) )+' commision + $'+other_user_bonus_html+' Bonus</span></div></div>');
						
						}

					}
					
					else {
						
						$('#user_total_paid').html( '$'+(( total_commision_value + parseFloat(users_bonus_html) ).toFixed(2)) );
						
						$('#commision_split').html('<p> <button class="ui-button customer-email btn--link show-when-printing" type="button" name="button">'+users_name+'</button></p> ');
						
						$('#user_two_commision_container').remove();
						
						$('#user_total_bonus').text('$'+users_bonus_html);
						
						$('#users_bonus_and_commision').html( '$'+( ( total_commision_value + parseFloat( users_bonus_html )).toFixed(2) )+' TO '+users_name );
						
						$('#user_bonus_btm_form').html( '$'+users_bonus_html );
							
					}

					dialog.dialog('close');
				}
			});
			
			@else
					
				var users_name = "{{ $order->student_name}}";
				
				var other_user_name = $( '#other_user_name option:selected' ).html();
				
				var users_bonus_html = {{ $users_bonus }};
				
				var other_user_bonus_html = {{ $other_user_bonus }};
				
				var user_bonus_total_value = ( parseFloat(users_bonus_html) + parseFloat(other_user_bonus_html) ).toFixed(2) ;
				
				var job_amount = parseFloat( {{ $order->order_total }} ).toFixed(2)
				
				var user_commision = {{ $order->commision }};
				
				var form_data = $('#order_edit_form').serializeArray();
				
				var total_commision_value = ( user_commision / 100 ) *job_amount;
				
				var users_bonus_and_commision = ( ( total_commision_value / 2 ) + parseFloat(users_bonus_html) ).toFixed(2);
				
				var other_user_bonus_and_commision = ( ( total_commision_value /2) + parseFloat(other_user_bonus_html) ).toFixed(2);
					
				var total_paid_value = ( parseFloat(users_bonus_and_commision) + parseFloat(other_user_bonus_and_commision) ).toFixed(2) ;
				
				var selected_value = $(' #splitsheet option:selected ').val();
				
				form_data.push(
								{
									'name' : 'other_user_name',
									'value' : other_user_name
								},
								{
									'name' : 'order_id',
									'value' : '{{ $order->order_id }}'
								},
								{
									'name' : 'action',
									'value' : 'orders_student_edit'
								}
							);
				
				$.ajax({
					
					type: 'POST',
					
					url: "{{ route('ajax') }}",
					
					data: form_data,
					
					success: function (response) {
						
						var ajax_data = JSON.parse(response);
						
						if( ajax_data['status'] = 'success' ){

							$('#splitsheet_value_btm_form').html(selected_value);
								
							if( selected_value == 'yes') {
								
								$('#commision_split').html('<P>SPLITED 50/50 WITH</P><p> <button class="ui-button customer-email btn--link show-when-printing" type="button" name="button">'+users_name+'</button> & <button class="ui-button customer-email btn--link show-when-printing" type="button" name="button">'+other_user_name+'</button> </p> ');
								
								$('#other_user_bonus_amount').html('$'+(( total_commision_value/2 ).toFixed(2) )+' commision + $'+other_user_bonus_html+' Bonus');
								
								$('#user_total_bonus').text('$'+user_bonus_total_value );
								
								$('#users_bonus_and_commision').html(users_bonus_and_commision+' TO '+users_name);
								
								$('#other_user_bonus_and_commision').html(other_user_bonus_and_commision+' TO '+other_user_name);
								
								$('#users_bonus').html('$'+( (total_commision_value/2 ).toFixed(2) )+' commision + $'+users_bonus_html+' Bonus');
								
								$('#user_total_paid').html( '$'+total_paid_value );
								
								$('#user_bonus_btm_form').html('$'+user_bonus_total_value );
								
								if( ( $('#commision_container').find('#user_two_commision_container').length ) == 0 ) {
								
									$('#commision_container').append( '<div id="user_two_commision_container" class="ui-stack ui-stack--wrap ui-stack--alignment-baseline"><div class="ui-stack-item ui-stack-item--fill"><h3 class="ui-subheading">'+other_user_bonus_and_commision+' TO '+other_user_name+'</h3><span id="other_user_bonus">$'+( (total_commision_value/2 ).toFixed(2) )+' commision + $'+other_user_bonus_html+' Bonus</span></div></div>');
								
								}

							}
							
							else {
								
								$('#users_bonus').html('$'+( (total_commision_value ).toFixed(2) )+' commision + $'+users_bonus_html+' Bonus');
								
								$('#user_total_paid').html( '$'+(( total_commision_value + parseFloat(users_bonus_html) ).toFixed(2)) );
								
								$('#commision_split').html('<p> <button class="ui-button customer-email btn--link show-when-printing" type="button" name="button">'+users_name+'</button></p> ');
								
								$('#user_two_commision_container').remove();
								
								$('#user_total_bonus').text('$'+users_bonus_html);
								
								$('#users_bonus_and_commision').html( '$'+( ( total_commision_value + parseFloat( users_bonus_html )).toFixed(2) )+' TO '+users_name );
								
								$('#user_bonus_btm_form').html( '$'+users_bonus_html );
									
							}

							dialog.dialog('close');
							
						}
					}
				});
			
			@endif
			
		}
		var dialog = $('#dialog');
		
		dialog.dialog({
			autoOpen: false,
			width: 350,
			modal: true,
			draggable: false,
			resizable: false,
			buttons: {
				Cancel: function() {
					dialog.dialog( "close" );
				},
				Save: save
			},
			close: function() {
				//form[ 0 ].reset();
				//allFields.removeClass( "ui-state-error" );
			}
		});

		$( "#edit-order" ).on( "click", function() {
			dialog.dialog( "open" );
		});
		
		//user two html
		var user_two = $(' #user_two ').html();
		var selected_val;
		$(' #splitsheet ').change( function(){
			selected_val = $(' #splitsheet option:selected ').val();
			if( selected_val == 'no' ) {
				$(' #user_two ').css('display','none');
			}
			else {
				$(' #user_two ').css('display','block');
			} 
		} );
		
		$('#new_comment_order').submit( function(event) {
			event.preventDefault();
			$.ajax({
					
					type: 'POST',
					
					url: "{{ route('ajax') }}",
					
					data: $(this).serializeArray(),
					
					success: function (response) {
						
						console.log(response);
						
						$('.comment_body').append(
								'<div class="cmt_items">'+
									'<span>{{ $avatar_name }}:</span>'+ $('#new_comment_order_ta').val() +
								'</div>'
						);
						
						$('#new_comment_order_ta').val('');
						
						
					}
			});
			
		});
		
	</script>
@endsection
