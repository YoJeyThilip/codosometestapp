@extends('layouts.dashboard')

@section('dashboard-content')
<div class="page page--with-sidebar page--with-greeting--default campus-dashboard-content">
   <header class="home-greeting">
      <div class="home-takeover-greeting ">
         <div class="home-takeover-greeting__wrapper no-live-ticker">
            <div class="ui-stack ui-stack--alignment-leading">
               <div class="ui-stack-item ui-stack-item--fill">
                  <div class="fresh-home-greeting__content">
                     <p class="fresh-home-greeting__heading">
                        Hi, {{ $avatar_name }}
                     </p>
                     <p class="fresh-home-greeting__body">
						Here’s what’s happening with your business&nbsp;this&nbsp;month.
                     </p>
                  </div>
               </div>
            </div>
            <section class="home-takeover-stats">
			   <div class="ui-card__section takeover_meta_table" >
					@if( isset($user_orders_num) )
						<div class="home-takeover-data__wrap">
						   <figcaption class="home-takeover-data__label">
								Orders
						   </figcaption>
						   <figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
							  <span class="home-takeover-data__number ui-title-bar__title" data-bind="takeover.humanized.totalSales">{{ $user_orders_num }}</span>
						   </figure>
						</div>
					@endif
					@if( isset($user_order_amount) )
						<div class="home-takeover-data__wrap">
						   <figcaption class="home-takeover-data__label">
								order amount
						   </figcaption>
						   <figure class="home-takeover-data__figure skeleton-today__heading skeleton-today__heading--hidden">
							  <span class="home-takeover-data__number ui-title-bar__title" data-bind="takeover.humanized.totalSales">${{ number_format( $user_order_amount ,2 ) }}</span>
						   </figure>
						</div>
					@endif
			   </div>
            </section>
         </div>
      </div>
   </header>
   <div class="page__content">
      <div class="skeleton-feed clearfix skeleton-feed--is-loaded" style="display: block;">
         <div class="ui-feed ui-feed--plain">
            <div class="ui-feed__item ui-feed__item--card js-home-item " data-handle="api_messenger_commerce_order_settings_customization_card" context="card">
               <div class="overlaid next-card ">
                  <div class="home-card-content home-card-content--has-image">
                     <div class="home-card-content__wrapper order-notification-dashboard">
						<div class="ui-stack ui-stack--wrap ui-stack--alignment-center">
							<div class="ui-stack-item">
								<div class="notification-dot-dashboard"></div>
							</div>
							<div class="ui-stack-item ui-stack-item--fill">
								<h3 class="ui-subheading">15 students to be payed</h3>
							</div>
							<div class="ui-stack-item">
								<a class="btn " role="button" href="{{ route('orders.index') }}" data-polaris-unstyled>View orders</a>
							</div>
						</div>
                     </div>
                     <div class="home-card-content__wrapper order-notification-dashboard">
						<div class="ui-stack ui-stack--wrap ui-stack--alignment-center">
							<div class="ui-stack-item">
								<div class="notification-dot-dashboard"></div>
							</div>
							<div class="ui-stack-item ui-stack-item--fill">
								<h3 class="ui-subheading">105 order waiting to be payed by clients</h3>
							</div>
							<div class="ui-stack-item">
								<a class="btn " role="button" href="{{ route('orders.index') }}" data-polaris-unstyled >View orders</a>
							</div>
						</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ui-feed__item ui-feed__item--card js-home-item " data-handle="api_messenger_commerce_order_settings_customization_card" context="card">
               <div class="overlaid next-card ">
                  <div class="home-card-content home-card-content--has-image">
                     <div class="home-card-content__title">
                        <h3 class="next-heading next-heading--no-margin">Need more insite</h3>
                     </div>
                     <div class="home-card-content__wrapper">
                        <div>
                           <p class="home-card-content__message">Check out resources.</p>
                           <div class="home-card-content__button-wrapper">
                              <a class="btn " role="button" href="{{ route('resources') }}" data-polaris-unstyled>Learn more</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="partial-icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg">
               <symbol id="next-ellipsis">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path d="M16 8c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm-6 0c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zM4 8c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z"></path>
                  </svg>
               </symbol>
               <symbol id="dismiss">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path d="M11.414 10l4.293-4.293c.391-.391.391-1.023 0-1.414s-1.023-.391-1.414 0l-4.293 4.293-4.293-4.293c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414l4.293 4.293-4.293 4.293c-.391.391-.391 1.023 0 1.414.195.195.451.293.707.293.256 0 .512-.098.707-.293l4.293-4.293 4.293 4.293c.195.195.451.293.707.293.256 0 .512-.098.707-.293.391-.391.391-1.023 0-1.414l-4.293-4.293z"></path>
                  </svg>
               </symbol>
               <symbol id="feedback">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path d="M13 11V9h2v2h-2zm-4 0V9h2v2H9zm-4 0V9h2v2H5zm5-9c-4.41 0-8 3.59-8 8 0 1.504.425 2.908 1.15 4.11l-1.07 2.496c-.16.375-.076.812.213 1.1.19.192.447.294.707.294.133 0 .268-.026.395-.08l2.494-1.07C7.09 17.575 8.495 18 10 18c4.41 0 8-3.59 8-8s-3.59-8-8-8z"></path>
                  </svg>
               </symbol>
               <symbol id="next-remove">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                     <path d="M18.263 16l10.07-10.07c.625-.625.625-1.636 0-2.26s-1.638-.627-2.263 0L16 13.737 5.933 3.667c-.626-.624-1.637-.624-2.262 0s-.624 1.64 0 2.264L13.74 16 3.67 26.07c-.626.625-.626 1.636 0 2.26.312.313.722.47 1.13.47s.82-.157 1.132-.47l10.07-10.068 10.068 10.07c.312.31.722.468 1.13.468s.82-.157 1.132-.47c.626-.625.626-1.636 0-2.26L18.262 16z"></path>
                  </svg>
               </symbol>
            </svg>
         </div>
      </div>
   </div>
   <?php /*
   <div class="page__sidebar">
      <div class="page__sidebar-background"></div>
      <div class="page__sidebar-content">
         <div class="next-card next-card--stacked next-card--home-channel-filters" data-define="{homeSidebar: new Shopify.HomeSidebar(this, [{&quot;id&quot;:&quot;all&quot;,&quot;name&quot;:&quot;All channels&quot;},{&quot;id&quot;:&quot;273625&quot;,&quot;name&quot;:&quot;Facebook&quot;},{&quot;id&quot;:&quot;580111&quot;,&quot;name&quot;:&quot;Online Store&quot;},{&quot;id&quot;:&quot;1195292&quot;,&quot;name&quot;:&quot;Messenger&quot;},{&quot;id&quot;:&quot;other&quot;,&quot;name&quot;:&quot;Other&quot;,&quot;additional_css&quot;:&quot;js-other-channel hide&quot;}], {
            showOther: true
            })}">
            <div class="fresh-home-sidebar-header">
               <div class="next-card__section next-card__section--half-spacing">
                  <div class="ui-stack ui-stack--alignment-center ui-stack--spacing-tight">
                     <div class="ui-stack-item ui-stack-item--fill">
                        <h1 class="ui-title">Summary</h1>
                     </div>
                     <div class="ui-stack-item">
                        <button class="ui-button ui-button--transparent" data-bind-event-click="Shopify.Home.toggleSidebar()" aria-label="Close summary" type="button" name="button">
                           <svg aria-hidden="true" focusable="false" class="next-icon next-icon--size-12">
                              <use xlink:href="#next-remove"></use>
                           </svg>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="next-card__section">
               <div class="next-grid next-grid--no-outside-padding">
                  <div class="next-grid__cell">
                  </div>
                  <div class="next-grid__cell">
                     <div>
                        <div class="ui-popover__container ui-popover__container--full-width-container">
                           <button class="ui-button btn--full-width" type="button" name="button">
                              <div class="next-grid next-grid--no-padding next-grid--space-between">
                                 <div class="next-grid__cell next-grid__cell--no-flex">
                                    <span bind="datepicker.dateLabel">This month</span>
                                 </div>
                                 <div class="next-grid__cell next-grid__cell--no-flex">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge ui-channel-selector__icon" role="img" aria-labelledby="next-disclosure-3df626911cf4e01238c734d4a9a4f3a2-title">
                                       <title id="next-disclosure-3df626911cf4e01238c734d4a9a4f3a2-title">Select date range</title>
                                       <use xlink:href="#next-disclosure"></use>
                                    </svg>
                                 </div>
                              </div>
                           </button>
                           <div class="ui-popover ui-popover--full-height" data-popover-relative-to-closest=".next-card">
                              <div class="ui-popover__tooltip"></div>
                              <div class="ui-popover__content-wrapper">
                                 <div class="ui-popover__content">
                                    <div class="ui-popover__pane">
                                       <ul class="next-list next-list--compact next-list--home-sidebar">
                                          <li>
                                             <button class="next-list__item next-list__item--is-selected" data-bind-class="{'next-list__item--is-selected': datepicker.selectedDate == &quot;today&quot;}" data-bind-event-click="datepicker.changeDate(&quot;today&quot;)">
                                                <div class="next-grid next-grid--no-padding next-grid--space-between">
                                                   <div class="next-grid__cell">
                                                      <span>Today</span>
                                                   </div>
                                                   <div class="next-grid__cell home-datepicker__quick-date-range">
                                                      <time data-bind="datepicker.formatted[&quot;today&quot;]" class="type--subdued">May 3</time>
                                                   </div>
                                                </div>
                                             </button>
                                          </li>
                                          <li>
                                             <button class="next-list__item" data-bind-class="{'next-list__item--is-selected': datepicker.selectedDate == &quot;yesterday&quot;}" data-bind-event-click="datepicker.changeDate(&quot;yesterday&quot;)">
                                                <div class="next-grid next-grid--no-padding next-grid--space-between">
                                                   <div class="next-grid__cell">
                                                      <span>Yesterday</span>
                                                   </div>
                                                   <div class="next-grid__cell home-datepicker__quick-date-range">
                                                      <time data-bind="datepicker.formatted[&quot;yesterday&quot;]" class="type--subdued">May 2</time>
                                                   </div>
                                                </div>
                                             </button>
                                          </li>
                                          <li>
                                             <button class="next-list__item" data-bind-class="{'next-list__item--is-selected': datepicker.selectedDate == &quot;this_week&quot;}" data-bind-event-click="datepicker.changeDate(&quot;this_week&quot;)">
                                                <div class="next-grid next-grid--no-padding next-grid--space-between">
                                                   <div class="next-grid__cell">
                                                      <span>This week</span>
                                                   </div>
                                                   <div class="next-grid__cell home-datepicker__quick-date-range">
                                                      <time data-bind="datepicker.formatted[&quot;this_week&quot;]" class="type--subdued">Apr 29–May 5</time>
                                                   </div>
                                                </div>
                                             </button>
                                          </li>
                                          <li>
                                             <button class="next-list__item" data-bind-class="{'next-list__item--is-selected': datepicker.selectedDate == &quot;this_month&quot;}" data-bind-event-click="datepicker.changeDate(&quot;this_month&quot;)">
                                                <div class="next-grid next-grid--no-padding next-grid--space-between">
                                                   <div class="next-grid__cell">
                                                      <span>This month</span>
                                                   </div>
                                                   <div class="next-grid__cell home-datepicker__quick-date-range">
                                                      <time data-bind="datepicker.formatted[&quot;this_month&quot;]" class="type--subdued">May 1–31</time>
                                                   </div>
                                                </div>
                                             </button>
                                          </li>
                                       </ul>
                                       <div class="home-calendar__wrapper" data-define="{calendar: new Shopify.HomeSidebarCalendar(this, datepicker)}">
                                          <div class="ui-stack ui-stack--alignment-center">
                                             <div class="home-calendar__month-nav-button">
                                                <button class="ui-button btn--icon btn--plain" data-bind-event-click="calendar.prevMonth()" aria-label="Previous month" type="button" name="button">
                                                   <svg aria-hidden="true" focusable="false" class="next-icon next-icon--rotate-180 next-icon--size-16">
                                                      <use xlink:href="#next-chevron"></use>
                                                   </svg>
                                                </button>
                                             </div>
                                             <div class="ui-stack-item ui-stack-item--fill">
                                                <h4 class="next-heading next-heading--small next-heading--no-margin type--centered" data-bind="calendar.monthName">May 2018</h4>
                                             </div>
                                             <div class="home-calendar__month-nav-button">
                                                <button class="ui-button btn--icon btn--plain" data-bind-event-click="calendar.nextMonth()" aria-label="Next month" type="button" name="button">
                                                   <svg aria-hidden="true" focusable="false" class="next-icon next-icon--size-16">
                                                      <use xlink:href="#next-chevron"></use>
                                                   </svg>
                                                </button>
                                             </div>
                                          </div>
                                          <div class="js-home-calendar">
                                             <table class="home-calendar">
                                                <caption class="is-visuallyhidden">Calendar for the month of May 2018</caption>
                                                <tbody>
                                                   <tr>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Sunday">Sun</abbr>
                                                      </th>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Monday">Mon</abbr>
                                                      </th>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Tuesday">Tue</abbr>
                                                      </th>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Wednesday">Wed</abbr>
                                                      </th>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Thursday">Thu</abbr>
                                                      </th>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Friday">Fri</abbr>
                                                      </th>
                                                      <th class="home-calendar__heading" scope="col">
                                                         <abbr title="Saturday">Sat</abbr>
                                                      </th>
                                                   </tr>
                                                   <tr>
                                                      <td class="home-calendar__date
                                                         ">
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">1</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">2</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         home-calendar__date--range-start
                                                         home-calendar__date--range-end
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">3</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">4</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">5</button>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">6</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">7</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">8</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">9</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">10</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">11</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">12</button>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">13</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">14</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">15</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">16</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">17</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">18</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">19</button>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">20</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">21</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">22</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">23</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">24</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">25</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">26</button>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">27</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">28</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">29</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">30</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                         <button class="ui-button btn--link btn--full-size" type="button" name="button">31</button>
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                      </td>
                                                      <td class="home-calendar__date
                                                         ">
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section class="next-card next-card--stacked" data-bind-show="homeSidebar.isActive(&quot;all&quot;)">
            <section class="next-card__section">
               <div class="home-graph__wrapper">
                  <div class="next-grid next-grid--no-padding">
                     <div class="next-grid__cell">
                        <h2 class="next-heading next-heading--quarter-margin next-heading--small">
                           Total sales
                        </h2>
                     </div>
                     <div class="next-grid__cell">
                        <p class="js-date-label type--subdued type--right" data-bind="homeSidebar.formattedDate">May 3</p>
                     </div>
                  </div>
                  <div define="{
                     sales: new Shopify.HomeSalesReport(
                     this,
                     {
                     channelId: &quot;all&quot;,
                     homeSidebar: homeSidebar
                     }
                     )
                     }" context="sales">
                     <div class="next-grid next-grid--no-padding next-grid--aligned-to-baseline next-grid--space-between">
                        <div class="next-grid__cell next-grid__cell--no-flex">
                           <span class="type--number type--number--large">€64,90</span>
                        </div>
                        <div class="next-grid__cell next-grid__cell--no-flex">
                           <span class="type--subdued">2 orders</span>
                        </div>
                     </div>
                     <div class="home-graph home-graph--sales">
                        <div class="home-graph__y-axis" aria-hidden="true">
                           <small class="home-graph__y-axis-label">
                           €50
                           </small>
                           <small class="home-graph__y-axis-label">
                           </small>
                           <small class="home-graph__y-axis-label">
                           €30
                           </small>
                           <small class="home-graph__y-axis-label">
                           </small>
                           <small class="home-graph__y-axis-label">
                           €10
                           </small>
                           <small class="home-graph__y-axis-label">
                           </small>
                        </div>
                        <div class="home-graph__bars-and-x-axis">
                           <div class="home-graph__bars">
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 12am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 10%;
                                    transform: translateX(-10%) translateY(-100%);">
                                    <p>May 3, 2018 12am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 1am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 10%;
                                    transform: translateX(-10%) translateY(-100%);">
                                    <p>May 3, 2018 1am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 2am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 10%;
                                    transform: translateX(-10%) translateY(-100%);">
                                    <p>May 3, 2018 2am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 3am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 13%;
                                    transform: translateX(-13%) translateY(-100%);">
                                    <p>May 3, 2018 3am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 4am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 17%;
                                    transform: translateX(-17%) translateY(-100%);">
                                    <p>May 3, 2018 4am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 5am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 21%;
                                    transform: translateX(-21%) translateY(-100%);">
                                    <p>May 3, 2018 5am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 6am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 25%;
                                    transform: translateX(-25%) translateY(-100%);">
                                    <p>May 3, 2018 6am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 7am €44,95 ">
                                 <div class="home-graph__tooltip" style="margin-top: 10px;
                                    left: 29%;
                                    transform: translateX(-29%) translateY(-100%);">
                                    <p>May 3, 2018 7am</p>
                                    <p>€44,95</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 91px;
                                    margin-top: 10px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 8am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 33%;
                                    transform: translateX(-33%) translateY(-100%);">
                                    <p>May 3, 2018 8am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 9am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 38%;
                                    transform: translateX(-38%) translateY(-100%);">
                                    <p>May 3, 2018 9am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 10am €19,95 ">
                                 <div class="home-graph__tooltip" style="margin-top: 61px;
                                    left: 42%;
                                    transform: translateX(-42%) translateY(-100%);">
                                    <p>May 3, 2018 10am</p>
                                    <p>€19,95</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 40px;
                                    margin-top: 61px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 11am €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 46%;
                                    transform: translateX(-46%) translateY(-100%);">
                                    <p>May 3, 2018 11am</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 12pm €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 50%;
                                    transform: translateX(-50%) translateY(-100%);">
                                    <p>May 3, 2018 12pm</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 1pm €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 54%;
                                    transform: translateX(-54%) translateY(-100%);">
                                    <p>May 3, 2018 1pm</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper" style="margin-left: 2px;" aria-label="May 3, 2018 2pm €0,00 ">
                                 <div class="home-graph__tooltip" style="margin-top: 99px;
                                    left: 58%;
                                    transform: translateX(-58%) translateY(-100%);">
                                    <p>May 3, 2018 2pm</p>
                                    <p>€0,00</p>
                                 </div>
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                              <div class="home-graph__bar-wrapper home-graph__bar-wrapper--future" style="margin-left: 2px;" aria-hidden="true">
                                 <div class="home-graph__bar" style="height: 2px;
                                    margin-top: 99px">
                                    <div class="home-graph__tooltip-tail"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="home-graph__x-axis home-graph__x-axis--many-data-points" aria-hidden="true">
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick home-graph__x-axis-tick--with-label">
                                 </div>
                                 <small class="home-graph__x-axis-label">12am</small>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick home-graph__x-axis-tick--with-label">
                                 </div>
                                 <small class="home-graph__x-axis-label">8am</small>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick home-graph__x-axis-tick--with-label">
                                 </div>
                                 <small class="home-graph__x-axis-label">4pm</small>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick">
                                 </div>
                              </div>
                              <div class="home-graph__x-axis-mark" style="margin-left: 2px;">
                                 <div class="home-graph__x-axis-tick home-graph__x-axis-tick--with-label">
                                 </div>
                                 <small class="home-graph__x-axis-label">11pm</small>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </section>
      </div>
   </div>
   */ ?>
</div>
@endsection