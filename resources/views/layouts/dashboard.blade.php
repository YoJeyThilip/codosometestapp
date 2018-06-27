<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<link rel="stylesheet" media="all" href="https://sdks.shopifycdn.com/polaris/1.14.1/polaris.min.css" />
		<link rel="stylesheet" media="all" href="{{ secure_asset('css/shopify-dashboard.css') }}">
		<link rel="stylesheet" media="all" href="{{ secure_asset('css/campus_ink.css') }}">
		<link rel="stylesheet" media="all" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   </head>
   <body class="page-home-index fresh-ui" id="body-content">
      <div class="ui-app-frame" data-tg-refresh="ui-app-frame" id="ui-app-frame">
         <header class="ui-app-frame__header">		 
            <a href="#AppFrameMain" class="ui-button ui-app-frame__skip-to-content">Skip to content</a>
            <div class="ui-top-bar">
               <div class="ui-top-bar__branding">
               </div>
               <div class="ui-top-bar__list">
                  <div class="ui-top-bar__item ui-top-bar__item--desktop-hidden">
                     <div class="ui-app-frame__aside-opener">
                        <button name="button" type="button" class="top-bar-button" aria-controls="AppFrameAside">
                           <svg class="next-icon next-icon--size-20 next-icon--no-nudge" role="img" aria-labelledby="menu-9f0f8b447f75751c94b14d00f0cb7119-title">
                              <title id="menu-9f0f8b447f75751c94b14d00f0cb7119-title">Open navigation</title>
                              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu"></use>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="ui-top-bar__item ui-top-bar__item--fill">
                     <section class="top-bar-search">
                        <div class="top-bar-search__input-wrapper">
                           <div class="next-input-wrapper next-navigation-search">
                              <label class="next-label helper--visually-hidden" for="primary-nav-search-input">Search. Your results will appear below as you type.</label>
                              <div class="next-input--stylized">
                                 <span class="next-input__add-on next-input__add-on--before">
                                    <svg class="next-icon next-icon--size-20" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-search-reverse"></use>
                                    </svg>
                                 </span>
                                 <input type="search" name="primary-nav-search-input" id="primary-nav-search-input" placeholder="Search" class="next-input next-input--search next-input--invisible">
                              </div>
                           </div>
                           <span class="top-bar-search__clear-btn-wrapper">
                              <div class="ui-frame ui-frame--fill ui-frame--circle ui-frame--size-12">
                                 <svg class="next-icon next-icon--color-white next-icon--size-8 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-remove"></use>
                                 </svg>
                              </div>
                           </span>
                        </div>
                     </section>
                  </div>
                  <div class="ui-top-bar__item ui-top-bar__item--separated ui-top-bar__item--bleed ui-top-bar__item--mobile-hidden">
                     <div class="ui-popover__container ui-popover__container--full-width-container">
                        <button name="button" type="button" class="top-bar-button top-bar-button--profile" id="AccountMenuActivator" data-tg-refresh="next-nav__avatar">
                           <div class="top-bar-profile">
                              <div class="top-bar-profile__avatar">
                                 <span class="user-avatar user-avatar--style-4" style="background-color: #{{ $avatar_background_color }}">
                                 <span class="user-avatar__initials">
									{{ $avatar_initials }}
                                 </span>
								@if( $avatar_url_small != '' )
									<img alt="" class="gravatar gravatar--size-thumb" src="{{ $avatar_url_small }}">
								@endif
                                 </span>
                              </div>
                              <div class="top-bar-profile__summary">
                                 <p class="top-bar-profile__title">
									{{ $avatar_name }}
                                 </p>
                                 <p class="top-bar-profile__description">
                                    Admin
                                 </p>
                              </div>
                           </div>
                        </button>
                        <div class="ui-popover ui-popover--full-height ui-popover--reduced-spacing userpop_up" data-popover-preferred-position="top">
                           <div class="ui-popover__tooltip"></div>
                           <div class="ui-popover__content-wrapper">
                              <div class="ui-popover__content">
                                 <div class="ui-popover__pane">
                                    <ul class="ui-action-list">
                                       <li class="ui-action-list__item">
                                          <a href="/" class="ui-action-list-action" data-bind-event-click="Shopify.Components.rootDispatcher.dispatch({type: 'nav:navigating'})" data-allow-default="1">
                                             <span class="ui-action-list-action__text">
                                                <div class="ui-stack ui-stack--wrap ui-stack--alignment-center ui-stack--spacing-tight">
                                                   <div class="ui-stack-item">
                                                      <svg role="img" class="next-icon next-icon--size-16" aria-labelledby="account-f01637ecf6755a8e6a9b890bc6397b44-title">
                                                         <title id="account-f01637ecf6755a8e6a9b890bc6397b44-title">Profile icon</title>
                                                         <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#account"></use>
                                                      </svg>
                                                   </div>
                                                   <div class="ui-stack-item ui-stack-item--fill">
                                                      <span>Your profile</span>
                                                   </div>
                                                </div>
                                             </span>
                                          </a>
                                       </li>
                                       <li class="ui-action-list__item">
                                          <a href="{{ route('logout') }}" class="ui-action-list-action">
                                             <span class="ui-action-list-action__text">
                                                <div class="ui-stack ui-stack--wrap ui-stack--alignment-center ui-stack--spacing-tight">
                                                   <div class="ui-stack-item">
                                                      <svg role="img" class="next-icon next-icon--size-16">
                                                         <title>Log out icon</title>
                                                         <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#minor-log-out"></use>
                                                      </svg>
                                                   </div>
                                                   <div class="ui-stack-item ui-stack-item--fill">
                                                      <span>Log out</span>
                                                   </div>
                                                </div>
                                             </span>
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ui-context-bar">
               <div class="ui-context-bar__branding">
                  <svg focusable="false" aria-hidden="true" class="ui-inline-svg masthead-logo" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 446.3 127.5">
                     <path d="M154.3 70.9c-3.8-2.1-5.8-3.8-5.8-6.2 0-3.1 2.7-5 7-5 5 0 9.4 2.1 9.4 2.1l3.5-10.7s-3.2-2.5-12.7-2.5c-13.2 0-22.4 7.6-22.4 18.2 0 6 4.3 10.6 10 13.9 4.6 2.6 6.2 4.5 6.2 7.2 0 2.9-2.3 5.2-6.6 5.2-6.4 0-12.4-3.3-12.4-3.3l-3.7 10.7s5.6 3.7 14.9 3.7c13.6 0 23.3-6.7 23.3-18.7.2-6.6-4.8-11.2-10.7-14.6zM208.5 48.4c-6.7 0-11.9 3.2-16 8l-.2-.1 5.8-30.4H183l-14.7 77.3h15.1l5-26.4c2-10 7.1-16.1 11.9-16.1 3.4 0 4.7 2.3 4.7 5.6 0 2.1-.2 4.6-.7 6.7l-5.7 30.3h15.1l5.9-31.2c.7-3.3 1.1-7.2 1.1-9.9.1-8.7-4.4-13.8-12.2-13.8zM255 48.4c-18.2 0-30.3 16.4-30.3 34.7 0 11.7 7.2 21.2 20.8 21.2 17.9 0 29.9-16 29.9-34.7.1-10.9-6.2-21.2-20.4-21.2zm-7.4 44.2c-5.2 0-7.3-4.4-7.3-9.9 0-8.7 4.5-22.8 12.7-22.8 5.4 0 7.1 4.6 7.1 9.1 0 9.4-4.5 23.6-12.5 23.6zM314.2 48.4c-10.2 0-16 9-16 9h-.2l.9-8.1h-13.4c-.7 5.5-1.9 13.8-3.1 20.1l-10.5 55.4H287l4.2-22.4h.3s3.1 2 8.9 2c17.8 0 29.4-18.2 29.4-36.6 0-10.3-4.5-19.4-15.6-19.4zm-14.4 44.5c-3.9 0-6.2-2.2-6.2-2.2l2.5-14.1c1.8-9.4 6.7-15.7 11.9-15.7 4.6 0 6 4.3 6 8.3 0 9.7-5.8 23.7-14.2 23.7zM351.4 26.6c-4.8 0-8.7 3.8-8.7 8.8 0 4.5 2.8 7.6 7.1 7.6h.2c4.7 0 8.8-3.2 8.9-8.8.1-4.4-2.9-7.6-7.5-7.6zM330.2 103.2h15.2l10.3-53.6h-15.3M394.1 49.4h-10.5l.5-2.5c.9-5.2 3.9-9.8 9-9.8 2.7 0 4.8.8 4.8.8l3-11.8s-2.6-1.3-8.2-1.3c-5.4 0-10.7 1.5-14.8 5-5.2 4.4-7.6 10.7-8.8 17.1l-.4 2.5h-7l-2.2 11.4h7l-8 42.3h15.1l8-42.3H392l2.1-11.4zM430.5 49.6s-9.5 23.8-13.7 36.8h-.2c-.3-4.2-3.7-36.8-3.7-36.8H397l9.1 49.2c.2 1.1.1 1.8-.3 2.5-1.8 3.4-4.7 6.7-8.2 9.1-2.8 2.1-6 3.4-8.5 4.3l4.2 12.8c3.1-.7 9.4-3.2 14.8-8.2 6.9-6.5 13.3-16.4 19.8-30l18.5-39.7h-15.9z"></path>
                     <g>
                        <path d="M72 124.3l37.4-8.1S95.9 24.9 95.8 24.3c-.1-.6-.6-1-1.1-1-.5 0-10-.7-10-.7s-6.6-6.6-7.4-7.3c-.2-.2-.4-.3-.6-.4L72 124.3zM75.1 14.7c-.1 0-.3.1-.4.1-.1 0-1.5.4-3.7 1.1-2.2-6.4-6.1-12.3-13-12.3h-.6C55.4 1.1 53 0 50.9 0 34.8 0 27.1 20.1 24.7 30.3c-6.2 1.9-10.7 3.3-11.2 3.5-3.5 1.1-3.6 1.2-4 4.5-.4 2.4-9.5 72.9-9.5 72.9l70.3 13.2 4.8-109.7zm-18.3 4.9v.7c-3.9 1.2-8.2 2.5-12.4 3.8 2.4-9.2 6.9-13.7 10.8-15.4 1 2.6 1.6 6.1 1.6 10.9zM50.4 4.3c.7 0 1.4.2 2.1.7-5.1 2.4-10.7 8.5-13 20.7-3.4 1.1-6.7 2.1-9.8 3 2.7-9.3 9.2-24.4 20.7-24.4zm2.8 54.3S49 56.4 44 56.4c-7.5 0-7.8 4.7-7.8 5.9 0 6.4 16.8 8.9 16.8 24 0 11.9-7.5 19.5-17.7 19.5-12.2 0-18.4-7.6-18.4-7.6l3.3-10.8s6.4 5.5 11.8 5.5c3.5 0 5-2.8 5-4.8 0-8.4-13.8-8.8-13.8-22.6 0-11.6 8.3-22.9 25.2-22.9 6.5 0 9.7 1.9 9.7 1.9l-4.9 14.1zM59.6 8c3.6.4 5.9 4.5 7.4 9.1-1.8.6-3.8 1.2-6 1.9v-1.3c0-3.9-.5-7.1-1.4-9.7z"></path>
                     </g>
                  </svg>
               </div>
               <div class="ui-context-bar__contents">
                  <p class="ui-context-bar__message">Unsaved changes</p>
                  <div class="ui-context-bar__actions-group">
                     <div><button class="ui-button ui-context-bar__actions-cancel" type="button" name="button">Discard</button></div>
                     <div><button class="ui-button ui-button--primary js-btn-loadable js-btn-primary ui-context-bar__actions-primary" type="button" name="button">Save</button></div>
                  </div>
               </div>
            </div>
            <div data-modal-context-ref-for="CancelContextModal" data-define="{ CancelContextModal: new Shopify.UIModal(document.getElementById('CancelContextModal'), { placeholder: this }) }"></div>
         </header>
         <aside id="AppFrameAside" class="ui-app-frame__aside">
            <div class="aside-profile">
               <div class="aside-profile__button" data-collapsible-target="AsideProfileMenu" aria-controls="AsideProfileMenu" aria-expanded="false" role="button">
                  <button name="button" type="button" class="top-bar-button top-bar-button--profile" id="AccountMenuActivator" data-tg-refresh="next-nav__avatar">
                     <div class="top-bar-profile">
                        <div class="top-bar-profile__avatar">
                           <span class="user-avatar user-avatar--style-4" style="background-color: #{{ $avatar_background_color }}">
                           <span class="user-avatar__initials">
                           {{ $avatar_initials }}
                           </span>
						   <img alt="" class="gravatar gravatar--size-thumb" src="{{ $avatar_url_small }}">
                           </span>
                        </div>
                        <div class="top-bar-profile__summary">
                           <p class="top-bar-profile__title">
							{{ $avatar_name }}
                           </p>
                           <p class="top-bar-profile__description">
                              Admin
                           </p>
                        </div>
                     </div>
                  </button>
                  <div class="aside-profile__icon">
                     <svg class="next-icon next-icon--rotate-90 next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-chevron"></use>
                     </svg>
                  </div>
               </div>
               <div class="aside-profile__menu" id="AsideProfileMenu" data-collapsible="accordion" data-collapsible-state="collapsed" aria-hidden="true">
                  <ul class="ui-action-list">
                     <li class="ui-action-list__item">
                        <a href="/settings/account/8102805549" class="ui-action-list-action" data-bind-event-click="Shopify.Components.rootDispatcher.dispatch({type: 'nav:navigating'})" data-allow-default="1">
                           <span class="ui-action-list-action__text">
                              <div class="ui-stack ui-stack--wrap ui-stack--alignment-center ui-stack--spacing-tight">
                                 <div class="ui-stack-item">
                                    <svg role="img" class="next-icon next-icon--size-16" aria-labelledby="account-edb69ed6fc7cdd9efc92d98fd0e5754f-title">
                                       <title id="account-edb69ed6fc7cdd9efc92d98fd0e5754f-title">Profile icon</title>
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#account"></use>
                                    </svg>
                                 </div>
                                 <div class="ui-stack-item ui-stack-item--fill">
                                    <span>Your profile</span>
                                 </div>
                              </div>
                           </span>
                        </a>
                     </li>
                     <li class="ui-action-list__item">
                        <a href="/auth/logout" class="ui-action-list-action" data-no-turbolink="true" data-method="post" data-shopify-desktop-id="admin-logout-link">
                           <span class="ui-action-list-action__text">
                              <div class="ui-stack ui-stack--wrap ui-stack--alignment-center ui-stack--spacing-tight">
                                 <div class="ui-stack-item">
                                    <svg role="img" class="next-icon next-icon--size-16" aria-labelledby="minor-log-out-e2840d769aa526c5796af3208300bc3e-title">
                                       <title id="minor-log-out-e2840d769aa526c5796af3208300bc3e-title">Log out icon</title>
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#minor-log-out"></use>
                                    </svg>
                                 </div>
                                 <div class="ui-stack-item ui-stack-item--fill">
                                    <span>Log out</span>
                                 </div>
                              </div>
                           </span>
                        </a>
                     </li>
                  </ul>
                  <ul class="ui-action-list">
                     <li class="ui-action-list__item"><a href="https://help.shopify.com/" class="ui-action-list-action" data-track-click="{action: &quot;Help Center (Manual)&quot;, category: &quot;Need Help&quot;}" target="_blank" rel="noopener noreferrer"><span class="ui-action-list-action__text">Shopify Help Center</span></a></li>
                     <li class="ui-action-list__item"><a href="https://ecommerce.shopify.com/forums" class="ui-action-list-action" data-track-click="{action: &quot;Shopify Forums&quot;, category: &quot;Need Help&quot;}" target="_blank" rel="noopener noreferrer"><span class="ui-action-list-action__text">Community forums</span></a></li>
                     <li class="ui-action-list__item"><a href="https://partners.shopify.com/services_marketplace?shop=whybuyapp.myshopify.com&amp;utm_campaign=profile" class="ui-action-list-action"><span class="ui-action-list-action__text">Hire a Shopify Expert</span></a></li>
                     <li class="ui-action-list__item"><button class="ui-action-list-action" data-bind-event-click="keyboardShortcuts.show()" type="button" name="button"><span class="ui-action-list-action__text">Keyboard shortcuts</span></button></li>
                     <script data-define="{keyboardShortcuts: new Shopify.Modal(this, {&quot;size&quot;:&quot;large&quot;})}" type="text/html" class="modal_source">
                        <header>
                        <h2>Keyboard Shortcuts</h2>
                        <button class="btn btn--plain close-modal">×</button>
                        </header>
                        
                        <div class="keyboard-commands__container"
                        data-define="{ _init: Shopify.KeyboardShortcuts.buildModal(this) }">
                        <div class="next-grid">
                          <div class="next-grid__cell next-grid__cell--no-flex">
                            <h2 class="heading">General shortcuts</h2>
                            <ul class="keyboard-commands ssb js-general-shortcuts">
                              <li class="keyboard-command">
                                <kbd class="keyboard-key"></kbd>
                                <span class="keyboard-name"></span>
                              </li>
                            </ul>
                            <h2 class="heading">Adding items to your store</h2>
                            <ul class="keyboard-commands js-creation-shortcuts">
                              <li class="keyboard-command">
                                <kbd class="keyboard-key"></kbd>
                                <span class="keyboard-name"></span>
                              </li>
                            </ul>
                        </div>    <div class="next-grid__cell">
                            <h2 class="heading">Navigating your admin panel</h2>
                            <ul class="keyboard-commands js-navigation-shortcuts navigating-commands">
                              <li class="keyboard-command">
                                <kbd class="keyboard-key"></kbd>
                                <span class="keyboard-name"></span>
                              </li>
                            </ul>
                        </div></div></div>
                        
                     </script>
                  </ul>
               </div>
            </div>
            <div class="ui-scrollable aside-scrollable">
               <div class="ui-scrollable__track" style="visibility: hidden;">
                  <div class="ui-scrollable__scrollbar" style="top: 2px; height: 10px;"></div>
               </div>
               <div class="ui-scrollable__scroll-content" style="padding: 0px 17px 17px 0px; margin: 0px -17px -17px 0px;">
                  <div class="ui-scrollable__content" style="margin-bottom: -17px;">
                     <div class="ui-scrollable__container">
                        <nav class="ui-nav ">
                           <div class="ui-nav__heading ui-nav__heading--hidden">
                              <div class="ui-nav__heading-label">
                                 <h3 class="ui-subheading ui-subheading--subdued" id="MainNavigationNavHeading">Main navigation</h3>
                              </div>
                           </div>
                           <ul class="ui-nav__group ui-nav__group--parent" aria-labelledby="MainNavigationNavHeading">
                              <li class="ui-nav__item ui-nav__item--parent @if( url()->current() == route('dashboard') ) ui-nav__item--selected ui-rollup__item--force-show @endif ">
                                 <a href="/" class="ui-nav__link ui-nav__link--parent">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-dashboard"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Home</span>
                                 </a>
                              </li>
                              <li class="ui-nav__item ui-nav__item--parent @if( url()->current() == route('orders.index') ) ui-nav__item--selected ui-rollup__item--force-show @endif">
                                 <a href="{{ route('orders.index') }}" class="ui-nav__link ui-nav__link--parent" data-rollup-target="Rollup1" aria-controls="Rollup1" aria-disabled="true" role="button">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-orders"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Orders</span>
                                 </a>
                                 <ul class="ui-rollup ui-nav__group ui-nav__group--child" data-rollup-mobile-only="true" id="Rollup1">
                                    <li class="ui-nav__item ui-nav__item--child"><a href="/orders" class="ui-nav__link ui-nav__link--child"><span class="ui-nav__label ui-nav__label--child">All orders</span></a></li>
                                    <li class="ui-nav__item ui-nav__item--child"><a href="/draft_orders" class="ui-nav__link ui-nav__link--child"><span class="ui-nav__label ui-nav__label--child">Drafts</span></a></li>
                                    <li class="ui-nav__item ui-nav__item--child"><a href="/checkouts" class="ui-nav__link ui-nav__link--child"><span class="ui-nav__label ui-nav__label--child">Abandoned checkouts</span></a></li>
                                 </ul>
                              </li>
							  @if( intval($user_role) > 3 )
                              <li class="ui-nav__item ui-nav__item--parent @if( url()->current() == route('students.index') ) ui-nav__item--selected ui-rollup__item--force-show @endif">
                                 <a href="{{ route('students.index') }}" class="ui-nav__link ui-nav__link--parent">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-customers"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Students</span>
                                 </a>
                              </li>
							  @endif
                              <li class="ui-nav__item ui-nav__item--parent">
                                 <a href="/dashboards" class="ui-nav__link ui-nav__link--parent" data-rollup-target="Rollup3" aria-controls="Rollup3" aria-disabled="true" role="button">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-reports"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Analytics</span>
                                 </a>
                                 <ul class="ui-rollup ui-nav__group ui-nav__group--child" data-rollup-mobile-only="true" id="Rollup3">
                                    <li class="ui-nav__item ui-nav__item--child"><a href="/dashboards" class="ui-nav__link ui-nav__link--child"><span class="ui-nav__label ui-nav__label--child">Dashboards</span></a></li>
                                    <li class="ui-nav__item ui-nav__item--child"><a href="/reports" class="ui-nav__link ui-nav__link--child"><span class="ui-nav__label ui-nav__label--child">Reports</span></a></li>
                                    <li class="ui-nav__item ui-nav__item--child"><a href="/dashboards/live" class="ui-nav__link ui-nav__link--child"><span class="ui-nav__label ui-nav__label--child">Live View</span></a></li>
                                 </ul>
                              </li>
							  @if( intval($user_role) > 3 )
                              <li class="ui-nav__item ui-nav__item--parent @if( url()->current() == route('reports') ) ui-nav__item--selected ui-rollup__item--force-show @endif">
                                 <a href="{{ route('reports') }}" class="ui-nav__link ui-nav__link--parent">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#online-store"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Reports</span>
                                 </a>
                              </li>
							  @endif
							   <li class="all_paid_orders_menu ui-nav__item ui-nav__item--parent @if( url()->current() == route('reports') ) ui-nav__item--selected ui-rollup__item--force-show @endif">
                                 <a href="{{ route('reports') }}" class="ui-nav__link ui-nav__link--parent">
                                    <span class="ui-nav__label ui-nav__label--parent">All Paid Orders</span>
                                 </a>
                              </li>
                              <li class="ui-nav__item ui-nav__item--parent @if( url()->current() == route('settings') ) ui-nav__item--selected ui-rollup__item--force-show @endif">
                                 <a href="{{ route('settings') }}" class="ui-nav__link ui-nav__link--parent">
                                    <svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-settings"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Settings</span>
                                 </a>
                              </li>
							  <li class="ui-nav__item ui-nav__item--parent @if( url()->current() == route('calculator') ) ui-nav__item--selected ui-rollup__item--force-show @endif">
                                 <a href="{{ route('calculator') }}" class="ui-nav__link ui-nav__link--parent">
									<svg class="next-icon next-icon--size-20 next-icon--no-nudge" aria-hidden="true" focusable="false">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-calculator"></use>
                                    </svg>
                                    <span class="ui-nav__label ui-nav__label--parent">Calculator</span>
                                 </a>
                              </li>
                           </ul>
                           <div class="ui-nav__align-bottom-shim"></div>
                           <ul class="ui-nav__group ui-nav__group--parent">
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ui-app-frame__aside-closer">
               <button class="ui-button ui-button--transparent ui-button--icon-only" aria-controls="AppFrameAside" aria-label="Close navigation" type="button" name="button">
                  <svg class="next-icon next-icon--color-white next-icon--size-20" aria-hidden="true" focusable="false">
                     <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-remove"></use>
                  </svg>
               </button>
            </div>
         </aside>
         <main id="AppFrameMain" class="ui-app-frame__main ">
		 	@yield('dashboard-content')
         </main>
      </div>
      <div class="ui-app-frame__backdrop"></div>
      <div id="global-icon-symbols" data-tg-refresh="global-icon-symbols" data-tg-refresh-always="true" style="display: none;">
         <svg xmlns="http://www.w3.org/2000/svg">
			<symbol id="next-calculator">
				<svg class="p_dt" viewBox="0 0 20 20" focusable="false" aria-hidden="true">
					<path d="M7.742 17.655a2.205 2.205 0 0 0-1.558-.646h-.991a2.202 2.202 0 0 1-2.202-2.202v-.991c0-.584-.233-1.145-.646-1.558l-.7-.7a2.203 2.203 0 0 1 0-3.115l.7-.7c.413-.413.646-.974.646-1.558v-.991c0-1.216.986-2.202 2.202-2.202h.991c.584 0 1.145-.233 1.558-.646l.7-.7c.86-.86 2.255-.86 3.115 0l.7.7c.414.413.974.646 1.558.646h.991c1.216 0 2.202.986 2.202 2.202v.991c0 .584.233 1.145.646 1.558l.7.7c.86.86.86 2.255 0 3.115l-.7.7a2.205 2.205 0 0 0-.646 1.558v.991a2.202 2.202 0 0 1-2.202 2.202h-.991c-.584 0-1.144.233-1.558.646l-.7.7c-.86.86-2.255.86-3.115 0l-.7-.7z" fill="currentColor"></path><path d="M19.06 7.734l-.7-.7a1.217 1.217 0 0 1-.353-.851v-.991a3.206 3.206 0 0 0-3.203-3.202h-.99c-.32 0-.623-.125-.85-.353l-.7-.7a3.207 3.207 0 0 0-4.53 0l-.7.7c-.229.228-.53.353-.852.353h-.99A3.206 3.206 0 0 0 1.99 5.192v.99c0 .317-.129.628-.352.852l-.7.7a3.207 3.207 0 0 0 0 4.529l.7.7c.223.224.352.534.352.85v.992a3.206 3.206 0 0 0 3.203 3.202h.99c.321 0 .623.125.851.353l.7.7a3.192 3.192 0 0 0 2.265.936c.82 0 1.64-.312 2.265-.936l.7-.7c.228-.228.53-.353.851-.353h.99a3.206 3.206 0 0 0 3.203-3.202v-.991c0-.317.13-.627.352-.851l.702-.7a3.208 3.208 0 0 0 0-4.53M12.288 6.29l-6 6a.999.999 0 1 0 1.414 1.414l6-6A.999.999 0 1 0 12.29 6.29M7.496 8.996a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m5 2a1.5 1.5 0 1 0 .001 3.001 1.5 1.5 0 0 0 0-3m5.15-.148l-.702.7a3.181 3.181 0 0 0-.938 2.265v.99c0 .664-.539 1.203-1.203 1.203h-.99a3.18 3.18 0 0 0-2.265.939l-.7.7a1.205 1.205 0 0 1-1.702 0l-.7-.7a3.178 3.178 0 0 0-2.265-.94h-.99a1.203 1.203 0 0 1-1.203-1.201v-.991c0-.856-.333-1.66-.938-2.265l-.7-.7a1.203 1.203 0 0 1 0-1.701l.7-.7c.605-.605.938-1.41.938-2.265v-.991c0-.663.54-1.202 1.203-1.202h.99c.856 0 1.66-.333 2.265-.94l.7-.7a1.205 1.205 0 0 1 1.702 0l.7.7a3.18 3.18 0 0 0 2.265.94h.99c.664 0 1.203.539 1.203 1.202v.99c0 .856.333 1.66.938 2.266l.701.7a1.204 1.204 0 0 1 0 1.7"></path>
				</svg>
			</symbol>
			<symbol id="chevron-left-thinner">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M12 16c-.256 0-.512-.098-.707-.293l-5-5c-.39-.39-.39-1.023 0-1.414l5-5c.39-.39 1.023-.39 1.414 0s.39 1.023 0 1.414L8.414 10l4.293 4.293c.39.39.39 1.023 0 1.414-.195.195-.45.293-.707.293z"></path>
				</svg>
			</symbol>
            <symbol id="next-dashboard">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M7 13h6v6H7z"></path>
                  <path d="M19.664 8.252c.413.368.45 1 .083 1.413-.197.222-.472.335-.747.335-.236 0-.474-.083-.664-.252l-.336-.3V19c0 .552-.447 1-1 1H3c-.553 0-1-.448-1-1V9.45l-.336.298c-.413.364-1.045.33-1.41-.083-.368-.414-.33-1.045.082-1.413L2 6.772V1c0-.552.447-1 1-1h4c.553 0 1 .448 1 1v.44L9.336.252c.38-.336.95-.336 1.328 0l9 8zM16 18V7.67L10 2.34 4 7.67V18h2v-5c0-.552.447-1 1-1h6c.553 0 1 .448 1 1v5h2zm-8 0h4v-4H8v4zM4 2v2.996l2-1.778V2H4z"></path>
               </svg>
            </symbol>
            <symbol id="next-remove">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <path d="M18.263 16l10.07-10.07c.625-.625.625-1.636 0-2.26s-1.638-.627-2.263 0L16 13.737 5.933 3.667c-.626-.624-1.637-.624-2.262 0s-.624 1.64 0 2.264L13.74 16 3.67 26.07c-.626.625-.626 1.636 0 2.26.312.313.722.47 1.13.47s.82-.157 1.132-.47l10.07-10.068 10.068 10.07c.312.31.722.468 1.13.468s.82-.157 1.132-.47c.626-.625.626-1.636 0-2.26L18.262 16z"></path>
               </svg>
            </symbol>
            <symbol id="report">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M17 2H3c-.553 0-1 .448-1 1v14c0 .552.447 1 1 1h14c.553 0 1-.448 1-1V3c0-.552-.447-1-1-1zm-4 13h2V8h-2v7zm-4 0h2V5H9v10zm-4 0h2v-4H5v4z" fill="currentColor" fill-rule="evenodd"></path>
               </svg>
            </symbol>
            <symbol id="cash">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M19 10c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                  <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM9.977 7c.026 0 .65.04 1.316.707.39.39 1.024.39 1.414 0s.39-1.024 0-1.415C12.104 5.69 11.493 5.372 11 5.2V5c0-.553-.447-1-1-1-.552 0-1 .447-1 1v.184C7.84 5.598 7 6.698 7 8c0 2.28 1.727 2.712 2.758 2.97C10.873 11.25 11 11.354 11 12c0 .55-.448 1-.976 1-.026 0-.65-.04-1.317-.708-.39-.39-1.023-.39-1.414 0s-.39 1.024 0 1.415c.604.603 1.215.92 1.707 1.092v.2c0 .55.448 1 1 1 .553 0 1-.45 1-1v-.186C12.162 14.4 13 13.3 13 12c0-2.28-1.726-2.713-2.757-2.97C9.128 8.75 9 8.644 9 8c0-.552.45-1 .977-1z"></path>
               </svg>
            </symbol>
            <symbol id="orders">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M1 13h5l1 2h6l1-2h5v6H1z"></path>
                  <path d="M2 18h16v-4h-3.382l-.723 1.447c-.17.34-.516.553-.895.553H7c-.38 0-.725-.214-.895-.553L5.382 14H2v4zM19 1c.552 0 1 .448 1 1v17c0 .552-.448 1-1 1H1c-.552 0-1-.448-1-1V2c0-.552.448-1 1-1h4c.552 0 1 .448 1 1s-.448 1-1 1H2v9h4c.38 0 .725.214.895.553L7.618 14h4.764l.723-1.447c.17-.34.516-.553.895-.553h4V3h-3c-.552 0-1-.448-1-1s.448-1 1-1h4zM6.293 6.707c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0L9 6.586V1c0-.552.448-1 1-1s1 .448 1 1v5.586l1.293-1.293c.39-.39 1.023-.39 1.414 0s.39 1.023 0 1.414l-3 3c-.195.195-.45.293-.707.293s-.512-.098-.707-.293l-3-3z"></path>
               </svg>
            </symbol>
            <symbol id="next-preview">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M17.928 9.628c-.092-.229-2.317-5.628-7.929-5.628s-7.837 5.399-7.929 5.628c-.094.239-.094.505 0 .744.092.229 2.317 5.628 7.929 5.628s7.837-5.399 7.929-5.628c.094-.239.094-.505 0-.744m-7.929 4.372c-2.209 0-4-1.791-4-4s1.791-4 4-4c2.21 0 4 1.791 4 4s-1.79 4-4 4m0-6c-1.104 0-2 .896-2 2s.896 2 2 2c1.105 0 2-.896 2-2s-.895-2-2-2"></path>
               </svg>
            </symbol>
            <symbol id="next-chevron">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M8 16c-.256 0-.512-.098-.707-.293-.39-.39-.39-1.023 0-1.414L11.586 10 7.293 5.707c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l5 5c.39.39.39 1.023 0 1.414l-5 5c-.195.195-.45.293-.707.293z"></path>
               </svg>
            </symbol>
            <symbol id="next-disclosure">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M6.28 9.28l3.366 3.366c.196.196.512.196.708 0L13.72 9.28c.293-.293.293-.767 0-1.06-.14-.14-.332-.22-.53-.22H6.81c-.414 0-.75.336-.75.75 0 .2.08.39.22.53z"></path>
               </svg>
            </symbol>
            <symbol id="menu">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <path d="M30.4 17.6H1.6C.717 17.6 0 16.885 0 16s.717-1.6 1.6-1.6h28.8c.883 0 1.6.715 1.6 1.6s-.717 1.6-1.6 1.6zm0-11.2H1.6C.717 6.4 0 5.685 0 4.8s.717-1.6 1.6-1.6h28.8c.883 0 1.6.715 1.6 1.6s-.717 1.6-1.6 1.6zm0 22.4H1.6c-.883 0-1.6-.715-1.6-1.6s.717-1.6 1.6-1.6h28.8c.883 0 1.6.715 1.6 1.6s-.717 1.6-1.6 1.6z"></path>
               </svg>
            </symbol>
            <symbol id="next-search-reverse">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M8 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm9.707 4.293l-4.82-4.82C13.585 10.493 14 9.296 14 8c0-3.313-2.687-6-6-6S2 4.687 2 8s2.687 6 6 6c1.296 0 2.492-.415 3.473-1.113l4.82 4.82c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414z"></path>
               </svg>
            </symbol>
            <symbol id="account">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10 15c-2.54 0-4.69 1.092-6 1.96C5.632 18.232 7.72 19 10 19s4.365-.767 6-2.04c-1.313-.87-3.463-1.96-6-1.96z"></path>
                  <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.487 10-10c0-5.514-4.486-10-10-10zm5.603 15.7C14.2 14.84 12.257 14 10 14c-2.256 0-4.2.842-5.604 1.7C2.92 14.248 2 12.23 2 10c0-4.41 3.59-8 8-8s8 3.59 8 8c0 2.23-.92 4.248-2.397 5.7zM6.15 17.01C7.217 16.456 8.536 16 10 16s2.782.457 3.85 1.008c-1.143.63-2.455.992-3.85.992s-2.708-.362-3.85-.99zM10 10c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm0-6C7.794 4 6 5.794 6 8s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z"></path>
               </svg>
            </symbol>
            <symbol id="minor-log-out">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M10 16c.553 0 1 .448 1 1s-.447 1-1 1c-4.411 0-8-3.589-8-8s3.589-8 8-8c.553 0 1 .448 1 1s-.447 1-1 1c-3.309 0-6 2.691-6 6s2.691 6 6 6zm7.707-6.707c.391.391.391 1.023 0 1.414l-3 3c-.195.195-.451.293-.707.293-.256 0-.512-.098-.707-.293-.391-.391-.391-1.023 0-1.414l1.293-1.293h-4.586c-.553 0-1-.448-1-1s.447-1 1-1h4.586l-1.293-1.293c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3 3z"></path>
               </svg>
            </symbol>
            <symbol id="cancel-small-minor">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M11.414 10l4.293-4.293c.391-.391.391-1.023 0-1.414s-1.023-.391-1.414 0l-4.293 4.293-4.293-4.293c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414l4.293 4.293-4.293 4.293c-.391.391-.391 1.023 0 1.414.195.195.451.293.707.293.256 0 .512-.098.707-.293l4.293-4.293 4.293 4.293c.195.195.451.293.707.293.256 0 .512-.098.707-.293.391-.391.391-1.023 0-1.414l-4.293-4.293z"></path>
               </svg>
            </symbol>
            <symbol id="next-orders">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M1 13h5l1 2h6l1-2h5v6H1z"></path>
                  <path d="M2 18h16v-4h-3.382l-.723 1.447c-.17.34-.516.553-.895.553H7c-.38 0-.725-.214-.895-.553L5.382 14H2v4zM19 1c.552 0 1 .448 1 1v17c0 .552-.448 1-1 1H1c-.552 0-1-.448-1-1V2c0-.552.448-1 1-1h4c.552 0 1 .448 1 1s-.448 1-1 1H2v9h4c.38 0 .725.214.895.553L7.618 14h4.764l.723-1.447c.17-.34.516-.553.895-.553h4V3h-3c-.552 0-1-.448-1-1s.448-1 1-1h4zM6.293 6.707c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0L9 6.586V1c0-.552.448-1 1-1s1 .448 1 1v5.586l1.293-1.293c.39-.39 1.023-.39 1.414 0s.39 1.023 0 1.414l-3 3c-.195.195-.45.293-.707.293s-.512-.098-.707-.293l-3-3z"></path>
               </svg>
            </symbol>
            <symbol id="next-products">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M4 7l-3 3 9 9 3-3z"></path>
                  <path d="M19 0h-9c-.265 0-.52.106-.707.293l-9 9c-.39.39-.39 1.023 0 1.414l9 9c.195.195.45.293.707.293s.512-.098.707-.293l9-9c.188-.187.293-.442.293-.707V1c0-.552-.448-1-1-1zm-9 17.586L2.414 10 4 8.414 11.586 16 10 17.586zm8-8l-5 5L5.414 7l5-5H18v7.586zM15 6c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z"></path>
               </svg>
            </symbol>
            <symbol id="next-customers">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10 13c-4 0-7 3-7 3l1 3h12l1-3s-3-3-7-3z"></path>
                  <path d="M17.707 15.293c.268.268.36.664.24 1.023l-1 3c-.135.41-.517.684-.947.684H4c-.43 0-.813-.275-.95-.684l-1-3c-.12-.36-.025-.755.243-1.023C2.427 15.158 5.635 12 10 12s7.572 3.158 7.707 3.293zM15.28 18l.56-1.687C14.92 15.56 12.687 14 10 14c-2.703 0-4.927 1.558-5.843 2.31L4.72 18h10.56zM10 2c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0 8c2.757 0 5-2.243 5-5s-2.243-5-5-5-5 2.243-5 5 2.243 5 5 5z"></path>
               </svg>
            </symbol>
            <symbol id="next-reports">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M7 5h6v10H7V5z"></path>
                  <path d="M19 18c.552 0 1 .448 1 1s-.448 1-1 1H1c-.552 0-1-.448-1-1s.448-1 1-1h18zm0-18c.552 0 1 .448 1 1v14c0 .552-.448 1-1 1H1c-.552 0-1-.448-1-1V9c0-.552.448-1 1-1h5V5c0-.552.448-1 1-1h5V1c0-.552.448-1 1-1h6zm-5 14h4V2h-4v12zm-6 0h4V6H8v8zm-6 0h4v-4H2v4z"></path>
               </svg>
            </symbol>
            <symbol id="next-discounts">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <title>Discounts</title>
                  <path fill="currentColor" d="M8.442 18.355l-.7-.7c-.413-.413-.974-.646-1.558-.646h-.99c-1.217 0-2.203-.987-2.203-2.203v-.99c0-.585-.232-1.146-.645-1.56l-.7-.7c-.86-.86-.86-2.254 0-3.114l.7-.7c.413-.413.646-.974.646-1.558v-.99c0-1.217.987-2.203 2.203-2.203h.99c.585 0 1.146-.233 1.56-.646l.7-.7c.86-.86 2.254-.86 3.114 0l.7.7c.414.413.974.646 1.558.646h.99c1.217 0 2.203.986 2.203 2.202v.99c0 .585.233 1.146.646 1.56l.7.7c.86.86.86 2.254 0 3.114l-.7.7c-.413.413-.646.974-.646 1.558v.99c0 1.217-.986 2.203-2.202 2.203h-.99c-.585 0-1.145.232-1.56.645l-.7.7c-.86.86-2.254.86-3.114 0z"></path>
                  <path d="M19.06 7.734l-.7-.7c-.224-.224-.353-.535-.353-.85V5.19c0-1.766-1.437-3.202-3.203-3.202h-.99c-.32 0-.623-.125-.85-.353l-.7-.7c-1.25-1.25-3.282-1.248-4.53 0l-.7.7c-.23.228-.53.353-.852.353h-.99c-1.766 0-3.203 1.436-3.203 3.202v.99c0 .317-.13.628-.353.852l-.7.7c-1.25 1.25-1.25 3.28 0 4.53l.7.7c.223.223.352.533.352.85v.99c0 1.767 1.436 3.203 3.202 3.203h.99c.32 0 .623.125.85.353l.7.7c.626.625 1.446.936 2.266.936s1.64-.312 2.265-.936l.7-.7c.228-.228.53-.353.85-.353h.99c1.767 0 3.204-1.436 3.204-3.202v-.99c0-.318.13-.628.352-.852l.7-.7c1.248-1.25 1.248-3.28 0-4.53zM12.29 6.29l-6 6c-.392.39-.392 1.022 0 1.413.194.195.45.293.706.293s.512-.098.707-.293l6-6c.39-.39.39-1.023 0-1.414s-1.023-.392-1.414 0zM7.495 8.995c.828 0 1.5-.672 1.5-1.5s-.672-1.5-1.5-1.5-1.5.672-1.5 1.5.672 1.5 1.5 1.5zm5 2c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5zm5.15-.147l-.7.7c-.606.604-.94 1.408-.94 2.264v.99c0 .664-.538 1.203-1.202 1.203h-.99c-.855 0-1.66.333-2.265.94l-.7.7c-.47.468-1.234.468-1.703 0l-.7-.7c-.605-.607-1.41-.94-2.265-.94h-.99c-.664 0-1.203-.54-1.203-1.202v-.99c0-.857-.334-1.66-.94-2.266l-.7-.7c-.47-.47-.47-1.233 0-1.702l.7-.7c.606-.605.94-1.41.94-2.265v-.99c0-.664.538-1.203 1.202-1.203h.99c.856 0 1.66-.333 2.265-.94l.7-.7c.47-.468 1.233-.468 1.702 0l.7.7c.604.607 1.41.94 2.264.94h.99c.664 0 1.203.54 1.203 1.202v.99c0 .856.333 1.66.938 2.266l.7.7c.47.47.47 1.232 0 1.7z"></path>
               </svg>
            </symbol>
            <symbol id="next-apps">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M1 1h7v7H1V1zm0 11h7v7H1v-7zm11 0h7v7h-7v-7z"></path>
                  <path d="M19 11h-7c-.553 0-1 .447-1 1v7c0 .553.447 1 1 1h7c.553 0 1-.447 1-1v-7c0-.553-.447-1-1-1zM8 11c.553 0 1 .447 1 1v7c0 .553-.447 1-1 1H1c-.553 0-1-.447-1-1v-7c0-.553.447-1 1-1h7zM8 0c.553 0 1 .447 1 1v7c0 .553-.447 1-1 1H1c-.553 0-1-.447-1-1V1c0-.553.447-1 1-1h7zM2 18h5v-5H2v5zM2 7h5V2H2v5zm11 11v-5h5v5h-5zM12 6c-.553 0-1-.447-1-1s.447-1 1-1h2V2c0-.553.447-1 1-1s1 .447 1 1v2h2c.553 0 1 .447 1 1s-.447 1-1 1h-2v2c0 .553-.447 1-1 1s-1-.447-1-1V6h-2z"></path>
               </svg>
            </symbol>
            <symbol id="next-add-circle-outline">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10,16 C6.691,16 4,13.309 4,10 C4,6.691 6.691,4 10,4 C13.309,4 16,6.691 16,10 C16,13.309 13.309,16 10,16"></path>
                  <path d="M10,2 C5.589,2 2,5.589 2,10 C2,14.411 5.589,18 10,18 C14.411,18 18,14.411 18,10 C18,5.589 14.411,2 10,2 M10,16 C6.691,16 4,13.309 4,10 C4,6.691 6.691,4 10,4 C13.309,4 16,6.691 16,10 C16,13.309 13.309,16 10,16 M13,9 L11,9 L11,7 C11,6.448 10.553,6 10,6 C9.447,6 9,6.448 9,7 L9,9 L7,9 C6.447,9 6,9.448 6,10 C6,10.552 6.447,11 7,11 L9,11 L9,13 C9,13.552 9.447,14 10,14 C10.553,14 11,13.552 11,13 L11,11 L13,11 C13.553,11 14,10.552 14,10 C14,9.448 13.553,9 13,9"></path>
               </svg>
            </symbol>
            <symbol id="online-store">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M19 6c0 1.657-1.343 3-3 3s-3-1.343-3-3c0 1.657-1.343 3-3 3S7 7.657 7 6c0 1.657-1.343 3-3 3S1 7.657 1 6V5l2-4h14l2 4v1z"></path>
                  <path d="M16 8c-1.103 0-2-.897-2-2h4c0 1.103-.897 2-2 2zm0 6H4v-4c1.193 0 2.267-.525 3-1.357C7.733 9.475 8.807 10 10 10s2.267-.525 3-1.357c.733.832 1.807 1.357 3 1.357v4zm-3.28 4H7.28c.358-.702.537-1.434.628-2h4.184c.09.566.27 1.298.627 2zM12 6c0 1.103-.897 2-2 2s-2-.897-2-2h4zM2 6h4c0 1.103-.897 2-2 2s-2-.897-2-2zm1.618-4h12.764l1 2H2.618l1-2zm16.277 2.553l-2-4C17.725.213 17.38 0 17 0H3c-.38 0-.725.214-.895.553l-2 4C.035 4.69 0 4.845 0 5v1c0 1.474.81 2.75 2 3.444V15c0 .552.447 1 1 1h2.87c-.156.747-.507 1.7-1.317 2.105-.415.208-.633.673-.527 1.125.108.45.51.77.974.77h10c.464 0 .866-.32.974-.77.106-.452-.112-.917-.527-1.125-.8-.4-1.153-1.356-1.313-2.105H17c.553 0 1-.448 1-1V9.444c1.19-.694 2-1.97 2-3.444V5c0-.155-.036-.31-.105-.447z"></path>
               </svg>
            </symbol>
            <symbol id="next-settings">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10 13c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zm7-3c0-.53-.064-1.044-.176-1.54L19 7.23l-2.047-3.464-2.106 1.188c-.794-.763-1.764-1.34-2.847-1.662V1H8v2.294c-1.083.322-2.053.9-2.847 1.662L3.047 3.768 1 7.232 3.176 8.46C3.064 8.955 3 9.47 3 10s.064 1.044.176 1.54L1 12.77l2.047 3.464 2.106-1.188c.794.762 1.764 1.34 2.847 1.662V19h4v-2.294c1.083-.322 2.053-.9 2.847-1.662l2.106 1.188L19 12.768l-2.176-1.227c.112-.49.176-1.01.176-1.54z"></path>
                  <path d="M19.492 11.897l-1.56-.88c.046-.342.068-.682.068-1.017s-.022-.675-.067-1.018l1.56-.88c.233-.132.404-.352.473-.61.07-.26.032-.538-.104-.77L17.815 3.26c-.277-.47-.875-.63-1.353-.363l-1.49.84c-.6-.475-1.267-.864-1.972-1.15V1c0-.552-.447-1-1-1H8c-.552 0-1 .448-1 1v1.586c-.705.287-1.37.676-1.97 1.152l-1.492-.84c-.475-.268-1.075-.107-1.352.36L.14 6.724c-.138.23-.175.508-.105.768s.24.48.474.613l1.55.88C2.02 9.325 2 9.665 2 10s.023.675.068 1.017l-1.56.88c-.233.132-.404.353-.473.612-.07.26-.033.53.104.76l2.04 3.46c.27.47.87.63 1.35.36l1.49-.844c.6.48 1.26.87 1.97 1.154V19c0 .552.443 1 1 1h4c.55 0 1-.448 1-1v-1.587c.7-.286 1.37-.675 1.97-1.152l1.49.85c.48.27 1.073.11 1.35-.36l2.047-3.46c.136-.23.174-.51.104-.77s-.24-.48-.473-.61zm-3.643-3.22c.1.45.15.894.15 1.323s-.05.873-.15 1.322c-.1.43.1.873.48 1.09l1.28.725-1.03 1.742-1.257-.71c-.383-.22-.866-.16-1.183.15-.69.66-1.534 1.15-2.44 1.42-.423.12-.714.51-.714.96V18H9v-1.294c0-.443-.29-.833-.714-.96-.906-.268-1.75-.76-2.44-1.424-.317-.306-.8-.366-1.184-.15l-1.252.707-1.03-1.75 1.287-.73c.385-.22.58-.66.485-1.09C4.052 10.87 4 10.43 4 10c0-.43.05-.874.152-1.322.096-.43-.1-.873-.485-1.09L2.38 6.862 3.41 5.12l1.252.707c.384.217.867.157 1.184-.15.69-.663 1.534-1.155 2.44-1.425.423-.126.714-.516.714-.958V2h2v1.294c0 .442.29.832.715.958.905.27 1.75.762 2.44 1.426.317.306.8.365 1.183.15l1.253-.708 1.03 1.742-1.28.726c-.38.217-.58.66-.48 1.09zM10 6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path>
               </svg>
            </symbol>
            <symbol id="next-pages">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M3 19h14V5l-4-4H3z"></path>
                  <path d="M4 18h12V5.414L12.586 2H4v16zm13 2H3c-.553 0-1-.447-1-1V1c0-.553.447-1 1-1h10c.266 0 .52.105.707.293l4 4c.188.187.293.44.293.707v14c0 .553-.447 1-1 1z"></path>
               </svg>
            </symbol>
            <symbol id="next-blogs">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11 13l6-6-4-4-6 6z"></path>
                  <path d="M18.878 1.122c-1.445-1.446-3.967-1.446-5.414 0L13 1.586 11.707.293C11.52.106 11.265 0 11 0H1C.447 0 0 .448 0 1v18c0 .553.447 1 1 1h14c.552 0 1-.447 1-1V9.414l2.878-2.878C19.6 5.813 20 4.85 20 3.83c0-1.024-.4-1.985-1.122-2.708zm-1.414 4L17 5.586 14.414 3l.464-.464c.69-.69 1.895-.69 2.586 0 .346.346.536.805.536 1.293s-.19.945-.536 1.29zM14 18H2V2h8.586l1 1-5.293 5.293c-.107.107-.18.233-.227.367-.003.01-.012.015-.015.024l-2 6c-.12.36-.024.756.244 1.023.19.19.446.293.707.293.107 0 .213-.016.317-.05l6-2c.01-.004.015-.013.024-.016.135-.048.26-.12.368-.227L14 11.414V18zm-6.563-7.15l1.712 1.713-2.57.856.856-2.57zm6.856-2.557L11 11.586 8.414 9 13 4.414 15.586 7l-1.293 1.293z"></path>
               </svg>
            </symbol>
            <symbol id="next-collections">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M7 15h12v4H7v-4z"></path>
                  <path d="M19 20c.553 0 1-.447 1-1V6c0-.297-.132-.578-.36-.77l-6-5c-.37-.307-.91-.307-1.28 0L10 2.198 7.64.23c-.37-.307-.91-.307-1.28 0l-6 5C.13 5.423 0 5.704 0 6v13c0 .553.447 1 1 1h18zM8 18v-2h10v2H8zm-6 0v-2h4v2H2zM7 2.302L8.438 3.5l-2.08 1.73C6.133 5.423 6 5.704 6 6v8H2V6.47L7 2.3zm6 0l5 4.167V14H8V6.47L13 2.3zM13 7c.553 0 1-.447 1-1s-.447-1-1-1c-.553 0-1 .447-1 1s.447 1 1 1z"></path>
               </svg>
            </symbol>
            <symbol id="next-help">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm0-4c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                  <path d="M16 17.966c-.436 0-.83-.15-1.158-.387 1.113-.716 2.055-1.664 2.762-2.78.243.33.396.73.396 1.168 0 1.1-.897 1.995-2 1.995zm-10.184-2.36l1.43-1.428c.792.523 1.736.83 2.754.83 1.027 0 1.982-.31 2.777-.844l1.43 1.426c-1.174.884-2.627 1.415-4.207 1.415-1.57 0-3.016-.524-4.184-1.398zM4 18.006c-1.103 0-2-.896-2-1.997 0-.45.158-.85.41-1.185.71 1.115 1.658 2.06 2.776 2.77-.333.252-.738.41-1.186.41zM2 4.03c0-1.1.897-1.996 2-1.996.448 0 .853.158 1.186.408-1.118.71-2.066 1.656-2.777 2.772C2.155 4.882 2 4.477 2 4.03zm12.163.386l-1.435 1.43c-.786-.513-1.72-.817-2.728-.817-1.018 0-1.962.305-2.753.83l-1.43-1.43C6.983 3.556 8.43 3.032 10 3.032c1.56 0 2.998.52 4.163 1.383zM16 1.996c1.103 0 2 .895 2 1.996 0 .454-.164.864-.422 1.2-.715-1.115-1.67-2.06-2.79-2.767.337-.262.752-.43 1.212-.43zM7 10.02c0-1.652 1.346-2.995 3-2.995s3 1.343 3 2.994c0 1.65-1.346 2.99-3 2.99s-3-1.34-3-2.99zm-2.598 4.176C3.526 13.03 3 11.586 3 10.02s.526-3.01 1.402-4.177l1.43 1.428C5.31 8.06 5 9.007 5 10.02s.31 1.957.833 2.747l-1.43 1.43zm11.213-.023l-1.435-1.43c.515-.786.82-1.72.82-2.724 0-1.028-.313-1.98-.847-2.775l1.43-1.426C16.467 6.992 17 8.443 17 10.02c0 1.556-.52 2.99-1.385 4.153zm2.906-1.283c.31-.902.48-1.865.48-2.87 0-1.027-.18-2.01-.5-2.93.91-.73 1.5-1.84 1.5-3.097C20 1.79 18.208 0 16 0c-1.266 0-2.39.597-3.12 1.517-.906-.306-1.872-.48-2.88-.48-1.018 0-1.992.178-2.905.49C6.363.622 5.252.037 4 .037c-2.206 0-4 1.79-4 3.99 0 1.253.585 2.36 1.49 3.09-.312.91-.49 1.885-.49 2.9s.178 1.988.49 2.9c-.905.73-1.49 1.84-1.49 3.09 0 2.2 1.794 3.99 4 3.99 1.252 0 2.363-.584 3.095-1.487.913.31 1.887.49 2.905.49 1.027 0 2.01-.183 2.93-.5.732.887 1.83 1.46 3.07 1.46 2.206 0 4-1.792 4-3.993 0-1.247-.58-2.35-1.48-3.08z"></path>
               </svg>
            </symbol>
            <symbol id="next-domains">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.895 11.447c-.34.678-1.45.678-1.79 0l-1-2c-.246-.494-.046-1.095.448-1.342.495-.246 1.095-.047 1.342.447l.105.21.106-.21c.34-.677 1.45-.677 1.79 0l.104.21.106-.21c.247-.494.847-.693 1.342-.447s.694.848.447 1.342l-1 2c-.17.34-.516.553-.895.553s-.725-.214-.894-.553l-.106-.21-.105.21zm-7 0c-.34.678-1.45.678-1.79 0l-1-2C-.14 8.953.06 8.352.555 8.105c.494-.246 1.094-.047 1.34.447l.106.21.11-.21c.34-.677 1.45-.677 1.79 0l.103.21.107-.21c.246-.494.846-.693 1.34-.447s.694.848.447 1.342l-1 2c-.17.34-.516.553-.895.553s-.724-.214-.893-.553l-.11-.21-.106.21zm14 0c-.34.678-1.45.678-1.79 0l-1-2c-.246-.494-.046-1.095.448-1.342.495-.246 1.095-.047 1.342.447l.105.21.106-.21c.34-.677 1.45-.677 1.79 0l.104.21.106-.21c.247-.494.847-.693 1.342-.447s.694.848.447 1.342l-1 2c-.17.34-.516.553-.895.553s-.725-.214-.894-.553l-.106-.21-.105.21zM19 0c.552 0 1 .447 1 1v4c0 .553-.448 1-1 1s-1-.447-1-1V2H2v3c0 .553-.448 1-1 1s-1-.447-1-1V1c0-.553.448-1 1-1h18zm0 14c.552 0 1 .447 1 1v4c0 .553-.448 1-1 1H1c-.552 0-1-.447-1-1v-4c0-.553.448-1 1-1s1 .447 1 1v3h16v-3c0-.553.448-1 1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-themes">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11 1l8 8v8c0 1.104-.896 2-2 2s-2-.896-2-2v-6c0 1.104-.896 2-2 2s-2-.896-2-2V1z"></path>
                  <path d="M17.98 17c0 .55-.45 1-1 1s-1-.45-1-1v-6c0-.552-.448-1-1-1s-1 .448-1 1c0 .55-.45 1-1 1s-1-.45-1-1V3.414l6 6V17zm-9.587-2.07c-1.243 0-2.413.483-3.293 1.363l-1.414 1.414c-.208.21-.505.317-.788.29-.298-.024-.56-.175-.74-.424-.274-.38-.19-.976.19-1.356l1.338-1.34c.94-.94 1.384-2.187 1.35-3.423l3.483 3.483c-.043 0-.084-.008-.127-.008zm3.094.148L4.902 8.492 9.98 3.414V11c0 1.525 1.147 2.774 2.623 2.962l-1.116 1.116zm8.2-6.785l-8-8c-.19-.19-.447-.283-.707-.283V0c-.014 0-.027.007-.04.008-.106.004-.21.023-.31.06-.01.004-.02.003-.03.007h-.003c-.112.048-.208.118-.294.197-.01.01-.02.012-.03.02l-8 8c-.39.392-.39 1.024 0 1.415 1.035 1.036 1.035 2.722 0 3.757l-1.34 1.34c-1.07 1.07-1.242 2.764-.397 3.938.52.722 1.323 1.177 2.202 1.248.08.007.162.01.243.01.794 0 1.556-.313 2.12-.88l1.415-1.413c1.004-1.005 2.755-1.004 3.758 0 .187.188.44.293.707.293s.52-.105.707-.293l2.293-2.293V17c0 1.654 1.346 3 3 3s3-1.346 3-3V9c0-.265-.105-.52-.293-.707z"></path>
               </svg>
            </symbol>
            <symbol id="next-giftcards">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M1 6h18v4H1V6z"></path>
                  <path d="M11 9V7h7v2h-7zm0 9v-7h5v7h-5zm-7 0v-7h5v7H4zM2 9V7h7v2H2zm2.75-5.5c0-.827.673-1.5 1.5-1.5 1.562 0 2.41 1.42 2.662 3H6.25c-.827 0-1.5-.673-1.5-1.5zM13 3c.552 0 1 .45 1 1s-.448 1-1 1h-1.887c.207-.964.738-2 1.887-2zm6 2h-3.185c.113-.314.185-.647.185-1 0-1.654-1.346-3-3-3-1.243 0-2.202.567-2.87 1.425C9.346 1.005 8.046 0 6.25 0c-1.93 0-3.5 1.57-3.5 3.5 0 .54.133 1.043.352 1.5H1c-.553 0-1 .448-1 1v4c0 .552.447 1 1 1h1v8c0 .552.447 1 1 1h14c.553 0 1-.448 1-1v-8h1c.553 0 1-.448 1-1V6c0-.552-.447-1-1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-link">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M17 2c.553 0 1 .448 1 1v4c0 .552-.447 1-1 1s-1-.448-1-1V5.414l-7.293 7.293c-.195.195-.45.293-.707.293s-.512-.098-.707-.293c-.39-.39-.39-1.023 0-1.414L14.586 4H13c-.553 0-1-.448-1-1s.447-1 1-1h4zm-4 9c.553 0 1 .448 1 1v5c0 .552-.447 1-1 1H3c-.553 0-1-.448-1-1V7c0-.552.447-1 1-1h5c.553 0 1 .448 1 1s-.447 1-1 1H4v8h8v-4c0-.552.447-1 1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-checkout">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M3 11h14l2-6L3 3z"></path>
                  <path d="M17 18c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zM4 17c0 .55-.45 1-1 1s-1-.45-1-1 .45-1 1-1 1 .45 1 1zM17.666 5.84L16.28 10H4V4.133L17.666 5.84zM17 14H4v-2h13c.43 0 .812-.275.95-.684l2-6c.093-.284.056-.596-.104-.85s-.425-.42-.722-.458L4 2.118V1c0-.552-.448-1-1-1H1C.448 0 0 .448 0 1s.448 1 1 1h1v12.184C.838 14.6 0 15.698 0 17c0 1.654 1.346 3 3 3s3-1.346 3-3c0-.353-.072-.686-.184-1h8.368c-.112.314-.184.647-.184 1 0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3z"></path>
               </svg>
            </symbol>
            <symbol id="next-marketing">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
                  <g>
                     <path d="M10 17.7c-2-.4-3.3-.7-5-.7 0 2 .2 4 .9 5.9.2.7.7 1.1 1.4 1.1h1.9c1 0 1.7-.9 1.5-1.9-.5-1.4-.7-3-.7-4.4zM19 0c-1 0-1.9.5-2.7 1.4C13.7 3.7 8.8 5 5 5c-2.8 0-5 2.2-5 5v.1c0 2.8 2.2 5 5 5 4 0 9 1.3 11.6 3.8.7.7 1.5 1.1 2.4 1.1 3.3 0 5-5 5-10S22.3 0 19 0zm0 17c-.4-.1-1.3-1.5-1.8-4 1.5-.1 2.8-1.4 2.8-3s-1.2-2.8-2.8-3c.4-2.5 1.3-4 1.8-4 .6.1 2 2.7 2 7s-1.4 6.9-2 7z"></path>
                  </g>
               </svg>
            </symbol>
            <symbol id="next-shipping">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11 4h5l3 5h-8z"></path>
                  <path d="M17.816 14c-.415-1.162-1.514-2-2.816-2s-2.4.838-2.816 2H12v-4h6v4h-.184zM15 16c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zM5 16c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zM2 4h8v10H7.816C7.4 12.838 6.302 12 5 12s-2.4.838-2.816 2H2V4zm13.434 1l1.8 3H12V5h3.434zm4.424 3.485l-3-5C16.678 3.185 16.35 3 16 3h-4c0-.552-.448-1-1-1H1c-.552 0-1 .448-1 1v12c0 .552.448 1 1 1h1.185C2.6 17.162 3.698 18 5 18s2.4-.838 2.816-2h4.37c.413 1.162 1.512 2 2.814 2s2.4-.838 2.816-2H19c.552 0 1-.448 1-1V9c0-.18-.05-.36-.142-.515z"></path>
               </svg>
            </symbol>
            <symbol id="next-email">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M1 3l9 9 9-9z"></path>
                  <path d="M2 16V5.414l7.293 7.293c.195.195.45.293.707.293s.512-.098.707-.293L18 5.414V16H2zM16.586 4L10 10.586 3.414 4h13.172zM19 2H1c-.552 0-1 .447-1 1v14c0 .553.448 1 1 1h18c.552 0 1-.447 1-1V3c0-.553-.448-1-1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-theme-settings">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10 13c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zm7-3c0-.53-.064-1.044-.176-1.54L19 7.23l-2.047-3.464-2.106 1.188c-.794-.763-1.764-1.34-2.847-1.662V1H8v2.294c-1.083.322-2.053.9-2.847 1.662L3.047 3.768 1 7.232 3.176 8.46C3.064 8.955 3 9.47 3 10s.064 1.044.176 1.54L1 12.77l2.047 3.464 2.106-1.188c.794.762 1.764 1.34 2.847 1.662V19h4v-2.294c1.083-.322 2.053-.9 2.847-1.662l2.106 1.188L19 12.768l-2.176-1.227c.112-.49.176-1.01.176-1.54z"></path>
                  <path d="M19.492 11.897l-1.56-.88c.046-.342.068-.682.068-1.017s-.022-.675-.067-1.018l1.56-.88c.233-.132.404-.352.473-.61.07-.26.032-.538-.104-.77L17.815 3.26c-.277-.47-.875-.63-1.353-.363l-1.49.84c-.6-.475-1.267-.864-1.972-1.15V1c0-.552-.447-1-1-1H8c-.552 0-1 .448-1 1v1.586c-.705.287-1.37.676-1.97 1.152l-1.492-.84c-.475-.268-1.075-.107-1.352.36L.14 6.724c-.138.23-.175.508-.105.768s.24.48.474.613l1.55.88C2.02 9.325 2 9.665 2 10s.023.675.068 1.017l-1.56.88c-.233.132-.404.353-.473.612-.07.26-.033.53.104.76l2.04 3.46c.27.47.87.63 1.35.36l1.49-.844c.6.48 1.26.87 1.97 1.154V19c0 .552.443 1 1 1h4c.55 0 1-.448 1-1v-1.587c.7-.286 1.37-.675 1.97-1.152l1.49.85c.48.27 1.073.11 1.35-.36l2.047-3.46c.136-.23.174-.51.104-.77s-.24-.48-.473-.61zm-3.643-3.22c.1.45.15.894.15 1.323s-.05.873-.15 1.322c-.1.43.1.873.48 1.09l1.28.725-1.03 1.742-1.257-.71c-.383-.22-.866-.16-1.183.15-.69.66-1.534 1.15-2.44 1.42-.423.12-.714.51-.714.96V18H9v-1.294c0-.443-.29-.833-.714-.96-.906-.268-1.75-.76-2.44-1.424-.317-.306-.8-.366-1.184-.15l-1.252.707-1.03-1.75 1.287-.73c.385-.22.58-.66.485-1.09C4.052 10.87 4 10.43 4 10c0-.43.05-.874.152-1.322.096-.43-.1-.873-.485-1.09L2.38 6.862 3.41 5.12l1.252.707c.384.217.867.157 1.184-.15.69-.663 1.534-1.155 2.44-1.425.423-.126.714-.516.714-.958V2h2v1.294c0 .442.29.832.715.958.905.27 1.75.762 2.44 1.426.317.306.8.365 1.183.15l1.253-.708 1.03 1.742-1.28.726c-.38.217-.58.66-.48 1.09zM10 6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path>
               </svg>
            </symbol>
            <symbol id="next-account">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M10 15c-2.54 0-4.69 1.092-6 1.96C5.632 18.232 7.72 19 10 19s4.365-.767 6-2.04c-1.313-.87-3.463-1.96-6-1.96z"></path>
                  <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.487 10-10c0-5.514-4.486-10-10-10zm5.603 15.7C14.2 14.84 12.257 14 10 14c-2.256 0-4.2.842-5.604 1.7C2.92 14.248 2 12.23 2 10c0-4.41 3.59-8 8-8s8 3.59 8 8c0 2.23-.92 4.248-2.397 5.7zM6.15 17.01C7.217 16.456 8.536 16 10 16s2.782.457 3.85 1.008c-1.143.63-2.455.992-3.85.992s-2.708-.362-3.85-.99zM10 10c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm0-6C7.794 4 6 5.794 6 8s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z"></path>
               </svg>
            </symbol>
            <symbol id="next-notes">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M3 19h14V5l-4-4H3z"></path>
                  <path d="M17.707 4.293l-4-4C13.52.105 13.265 0 13 0H3c-.552 0-1 .448-1 1v18c0 .552.448 1 1 1h14c.552 0 1-.448 1-1V5c0-.265-.105-.52-.293-.707zM16 18H4V2h8.586L16 5.414V18zm-3-5H7c-.552 0-1 .448-1 1s.448 1 1 1h6c.552 0 1-.448 1-1s-.448-1-1-1zm-7-3c0 .552.448 1 1 1h6c.552 0 1-.448 1-1s-.448-1-1-1H7c-.552 0-1 .448-1 1zm1-3h1c.552 0 1-.448 1-1s-.448-1-1-1H7c-.552 0-1 .448-1 1s.448 1 1 1z"></path>
               </svg>
            </symbol>
            <symbol id="next-phone">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M3 1h14v18H3V1z"></path>
                  <path d="M17 0c.552 0 1 .447 1 1v18c0 .553-.448 1-1 1H3c-.552 0-1-.447-1-1V1c0-.553.448-1 1-1h14zM4 18h12V2H4v16zM9 6h2c.552 0 1-.447 1-1s-.448-1-1-1H9c-.552 0-1 .447-1 1s.448 1 1 1zm1 8c-.552 0-1 .447-1 1s.448 1 1 1 1-.447 1-1-.448-1-1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-calendar">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M1 7h18v12H1V7z"></path>
                  <path d="M19 2c.553 0 1 .447 1 1v16c0 .553-.447 1-1 1H1c-.553 0-1-.447-1-1V3c0-.553.447-1 1-1h3V1c0-.553.447-1 1-1s1 .447 1 1v1h8V1c0-.553.447-1 1-1s1 .447 1 1v1h3zM2 18h16V8H2v10zM2 6h16V4H2v2zm4 4c-.553 0-1 .447-1 1s.447 1 1 1c.553 0 1-.447 1-1s-.447-1-1-1zm0 4c-.553 0-1 .447-1 1s.447 1 1 1c.553 0 1-.447 1-1s-.447-1-1-1zm4 0c-.553 0-1 .447-1 1s.447 1 1 1c.553 0 1-.447 1-1s-.447-1-1-1zm0-4c-.553 0-1 .447-1 1s.447 1 1 1c.553 0 1-.447 1-1s-.447-1-1-1zm4 0c-.553 0-1 .447-1 1s.447 1 1 1c.553 0 1-.447 1-1s-.447-1-1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-navigation">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11.2 11.2C10.535 11.863 7 13 7 13s1.137-3.537 1.8-4.2C9.463 8.14 13 7 13 7s-1.138 3.538-1.8 4.2z"></path>
                  <path d="M10 0C4.486 0 0 4.487 0 10s4.486 10 10 10 10-4.486 10-10c0-5.513-4.486-10-10-10zm1 17.93V17c0-.552-.447-1-1-1s-1 .448-1 1v.93c-3.61-.45-6.478-3.317-6.93-6.93H3c.553 0 1-.447 1-1 0-.552-.447-1-1-1h-.93C2.52 5.39 5.39 2.523 9 2.07V3c0 .553.447 1 1 1s1-.447 1-1v-.93c3.61.453 6.478 3.32 6.93 6.93H17c-.553 0-1 .448-1 1 0 .553.447 1 1 1h.93c-.452 3.612-3.32 6.478-6.93 6.93zm-.293-7.223c-.258.248-1.355.73-2.617 1.203.473-1.263.956-2.36 1.203-2.616.257-.248 1.354-.73 2.617-1.204-.474 1.262-.955 2.36-1.203 2.617zm2.522-5.194c-1.035.332-4.47 1.482-5.35 2.366s-2.037 4.315-2.37 5.35c-.114.354-.02.746.246 1.01.19.19.446.293.707.293.102 0 .206-.015.305-.048 1.032-.332 4.466-1.482 5.35-2.366s2.034-4.318 2.366-5.35c.115-.357.02-.75-.245-1.013-.264-.265-.66-.36-1.013-.245z"></path>
               </svg>
            </symbol>
            <symbol id="next-pos">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M13 8c0 1.657-1.343 3-3 3S7 9.657 7 8s1.343-3 3-3 3 1.343 3 3z"></path>
                  <path d="M10 0C5.59 0 2 3.59 2 8c0 7.495 7.197 11.694 7.504 11.87.153.087.325.13.496.13s.343-.043.496-.13C10.803 19.693 18 15.494 18 8c0-4.41-3.59-8-8-8zm0 17.813C8.477 16.783 4 13.295 4 8c0-3.31 2.69-6 6-6s6 2.69 6 6c0 5.276-4.482 8.778-6 9.813zM10 10c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm0-6C7.794 4 6 5.794 6 8s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z"></path>
               </svg>
            </symbol>
            <symbol id="next-cash">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M19 10c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                  <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM9.977 7c.026 0 .65.04 1.316.707.39.39 1.024.39 1.414 0s.39-1.024 0-1.415C12.104 5.69 11.493 5.372 11 5.2V5c0-.553-.447-1-1-1-.552 0-1 .447-1 1v.184C7.84 5.598 7 6.698 7 8c0 2.28 1.727 2.712 2.758 2.97C10.873 11.25 11 11.354 11 12c0 .55-.448 1-.976 1-.026 0-.65-.04-1.317-.708-.39-.39-1.023-.39-1.414 0s-.39 1.024 0 1.415c.604.603 1.215.92 1.707 1.092v.2c0 .55.448 1 1 1 .553 0 1-.45 1-1v-.186C12.162 14.4 13 13.3 13 12c0-2.28-1.726-2.713-2.757-2.97C9.128 8.75 9 8.644 9 8c0-.552.45-1 .977-1z"></path>
               </svg>
            </symbol>
            <symbol id="quick-search-temp/blog-add">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11 13l6-6-4-4-6 6z"></path>
                  <path d="M18.878 1.122c-1.445-1.446-3.967-1.446-5.414 0L13 1.586 11.707.293C11.52.106 11.265 0 11 0H1C.447 0 0 .448 0 1v18c0 .553.447 1 1 1h14c.552 0 1-.447 1-1V9.414l2.878-2.878C19.6 5.813 20 4.85 20 3.83c0-1.024-.4-1.985-1.122-2.708zm-1.414 4L17 5.586 14.414 3l.464-.464c.69-.69 1.895-.69 2.586 0 .346.346.536.805.536 1.293s-.19.945-.536 1.29zM14 18H2V2h8.586l1 1-5.293 5.293c-.107.107-.18.233-.227.367-.003.01-.012.015-.015.024l-2 6c-.12.36-.024.756.244 1.023.19.19.446.293.707.293.107 0 .213-.016.317-.05l6-2c.01-.004.015-.013.024-.016.135-.048.26-.12.368-.227L14 11.414V18zm-6.563-7.15l1.712 1.713-2.57.856.856-2.57zm6.856-2.557L11 11.586 8.414 9 13 4.414 15.586 7l-1.293 1.293z"></path>
               </svg>
            </symbol>
            <symbol id="quick-search-temp/blog-posts">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11 13l6-6-4-4-6 6z"></path>
                  <path d="M18.878 1.122c-1.445-1.446-3.967-1.446-5.414 0L13 1.586 11.707.293C11.52.106 11.265 0 11 0H1C.447 0 0 .448 0 1v18c0 .553.447 1 1 1h14c.552 0 1-.447 1-1V9.414l2.878-2.878C19.6 5.813 20 4.85 20 3.83c0-1.024-.4-1.985-1.122-2.708zm-1.414 4L17 5.586 14.414 3l.464-.464c.69-.69 1.895-.69 2.586 0 .346.346.536.805.536 1.293s-.19.945-.536 1.29zM14 18H2V2h8.586l1 1-5.293 5.293c-.107.107-.18.233-.227.367-.003.01-.012.015-.015.024l-2 6c-.12.36-.024.756.244 1.023.19.19.446.293.707.293.107 0 .213-.016.317-.05l6-2c.01-.004.015-.013.024-.016.135-.048.26-.12.368-.227L14 11.414V18zm-6.563-7.15l1.712 1.713-2.57.856.856-2.57zm6.856-2.557L11 11.586 8.414 9 13 4.414 15.586 7l-1.293 1.293z"></path>
               </svg>
            </symbol>
            <symbol id="quick-search-temp/blogs">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11 13l6-6-4-4-6 6z"></path>
                  <path d="M18.878 1.122c-1.445-1.446-3.967-1.446-5.414 0L13 1.586 11.707.293C11.52.106 11.265 0 11 0H1C.447 0 0 .448 0 1v18c0 .553.447 1 1 1h14c.552 0 1-.447 1-1V9.414l2.878-2.878C19.6 5.813 20 4.85 20 3.83c0-1.024-.4-1.985-1.122-2.708zm-1.414 4L17 5.586 14.414 3l.464-.464c.69-.69 1.895-.69 2.586 0 .346.346.536.805.536 1.293s-.19.945-.536 1.29zM14 18H2V2h8.586l1 1-5.293 5.293c-.107.107-.18.233-.227.367-.003.01-.012.015-.015.024l-2 6c-.12.36-.024.756.244 1.023.19.19.446.293.707.293.107 0 .213-.016.317-.05l6-2c.01-.004.015-.013.024-.016.135-.048.26-.12.368-.227L14 11.414V18zm-6.563-7.15l1.712 1.713-2.57.856.856-2.57zm6.856-2.557L11 11.586 8.414 9 13 4.414 15.586 7l-1.293 1.293z"></path>
               </svg>
            </symbol>
            <symbol id="next-spinner">
               <svg preserveAspectRatio="xMinYMin">
                  <circle class="next-spinner__ring" cx="50%" cy="50%" r="45%"></circle>
               </svg>
            </symbol>
            <symbol id="next-help-circle">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <circle cx="10" cy="10" r="9" fill="currentColor"></circle>
                  <path d="M10 0c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8m0-4c-.553 0-1 .447-1 1 0 .553.447 1 1 1 .553 0 1-.447 1-1 0-.553-.447-1-1-1m0-10c-1.654 0-3 1.346-3 3 0 .552.447 1 1 1 .553 0 1-.448 1-1 0-.551.448-1 1-1s1 .449 1 1c0 .322-.149.617-.409.808-1.011.74-1.591 1.808-1.591 2.929v.263c0 .553.447 1 1 1 .553 0 1-.447 1-1v-.263c0-.653.484-1.105.773-1.317.768-.564 1.227-1.468 1.227-2.42 0-1.654-1.346-3-3-3"></path>
               </svg>
            </symbol>
            <symbol id="next-search">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M8 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm9.707 4.293l-4.82-4.82C13.585 10.493 14 9.296 14 8c0-3.313-2.687-6-6-6S2 4.687 2 8s2.687 6 6 6c1.296 0 2.492-.415 3.473-1.113l4.82 4.82c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414z"></path>
               </svg>
            </symbol>
            <symbol id="next-ellipsis">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M16 8c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm-6 0c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zM4 8c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z"></path>
               </svg>
            </symbol>
            <symbol id="next-delete">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M4 7h12v12H4V7z"></path>
                  <path d="M17 2c.552 0 1 .447 1 1v4c0 .553-.448 1-1 1v11c0 .553-.448 1-1 1H4c-.552 0-1-.447-1-1V8c-.552 0-1-.447-1-1V3c0-.553.448-1 1-1h3.382L7.105.553C7.275.213 7.62 0 8 0h4c.38 0 .725.214.895.553L13.618 2H17zM8 16c.552 0 1-.447 1-1v-4c0-.553-.448-1-1-1s-1 .447-1 1v4c0 .553.448 1 1 1zm4 0c-.552 0-1-.447-1-1v-4c0-.553.448-1 1-1s1 .447 1 1v4c0 .553-.448 1-1 1zm-7 2h10V8H5v10zM4 4v2h12V4h-3c-.38 0-.725-.214-.895-.553L11.382 2H8.618l-.723 1.447C7.725 3.787 7.38 4 7 4H4z"></path>
               </svg>
            </symbol>
            <symbol id="next-checkmark">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M7 18c-.265 0-.52-.105-.707-.293l-6-6c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l5.236 5.236L18.24 2.35c.36-.42.992-.468 1.41-.11.42.36.47.99.11 1.41l-12 14c-.182.212-.444.338-.722.35H7z"></path>
               </svg>
            </symbol>
            <symbol id="next-checkmark-thick">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
                  <path d="M23.6 5L22 3.4c-.5-.4-1.2-.4-1.7 0L8.5 15l-4.8-4.7c-.5-.4-1.2-.4-1.7 0L.3 11.9c-.5.4-.5 1.2 0 1.6l7.3 7.1c.5.4 1.2.4 1.7 0l14.3-14c.5-.4.5-1.1 0-1.6z"></path>
               </svg>
            </symbol>
            <symbol id="next-subtract">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M15 9H5c-.553 0-1 .448-1 1s.447 1 1 1h10c.553 0 1-.448 1-1s-.447-1-1-1z"></path>
               </svg>
            </symbol>
            <symbol id="next-chevron-down">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <path d="M16 22.4c-.41 0-.82-.157-1.13-.47l-8-8c-.627-.625-.627-1.636 0-2.26s1.636-.627 2.26 0L16 18.537l6.87-6.87c.625-.625 1.636-.625 2.26 0s.627 1.638 0 2.263l-8 8c-.31.313-.72.47-1.13.47z"></path>
               </svg>
            </symbol>
            <symbol id="select-chevron">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
               </svg>
            </symbol>
            <symbol id="next-arrow-detailed">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 17" enable-background="new 0 0 16 17">
                  <path d="M7 3.411V16a1 1 0 0 0 2 0V3.411l4.96 4.963a1 1 0 1 0 1.414-1.414L8.707.289a1 1 0 0 0-1.414 0L.626 6.959a1 1 0 1 0 1.415 1.415L7 3.41z"></path>
               </svg>
            </symbol>
            <symbol id="circle-information">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M19 10c0 4.97-4.030 9-9 9s-9-4.030-9-9c0-4.97 4.030-9 9-9s9 4.030 9 9z"></path>
                  <path d="M10 0c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8m1-5v-3c0-.553-.448-1-1-1h-1c-.552 0-1 .447-1 1 0 .553.448 1 1 1v3c0 .553.448 1 1 1h1c.552 0 1-.447 1-1 0-.553-.448-1-1-1m-1-5.9c.607 0 1.1-.492 1.1-1.1 0-.607-.493-1.099-1.1-1.099-.607 0-1.1.492-1.1 1.099 0 .608.493 1.1 1.1 1.1"></path>
               </svg>
            </symbol>
            <symbol id="checkmark-circle">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <title>Circle-Tick</title>
                  <path fill="currentColor" d="M19 10c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                  <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm2.293-10.707L9 10.586 7.707 9.293c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414l2 2c.195.195.45.293.707.293s.512-.098.707-.293l4-4c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0z"></path>
               </svg>
            </symbol>
            <symbol id="alert-circle">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <title>Circle-Alert</title>
                  <path fill="currentColor" d="M19 10c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                  <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-13c-.552 0-1 .447-1 1v4c0 .553.448 1 1 1s1-.447 1-1V6c0-.553-.448-1-1-1zm0 8c-.552 0-1 .447-1 1s.448 1 1 1 1-.447 1-1-.448-1-1-1z"></path>
               </svg>
            </symbol>
            <symbol id="error-major">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M19 10c0 4.97-4.030 9-9 9s-9-4.030-9-9c0-4.97 4.030-9 9-9s9 4.030 9 9z"></path>
                  <path d="M10 17.5c-1.617 0-3.113-0.52-4.338-1.394l10.444-10.445c0.875 1.226 1.394 2.72 1.394 4.339 0 4.138-3.362 7.5-7.5 7.5zM10 2.5c1.617 0 3.113 0.52 4.338 1.394l-10.442 10.444c-0.876-1.225-1.395-2.719-1.395-4.338 0-4.138 3.362-7.5 7.5-7.5zM10 0c-5.513 0-10 4.487-10 10s4.487 10 10 10c5.512 0 10-4.488 10-10s-4.488-10-10-10z"></path>
               </svg>
            </symbol>
            <symbol id="flags">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <path fill="currentColor" d="M3.2 4.8h17.6v6.4h9.6l-3.2 6.4 3.2 6.4H12.8v-6.4h-8z"></path>
                  <path d="M25.77 18.314l2.04 4.085H14.4v-3.2h6.4c.884 0 1.6-.72 1.6-1.6v-4.8h5.41l-2.04 4.08c-.227.45-.227.98 0 1.43zM4.305 6.4H19.2V16H6.44L4.306 6.4zM28.99 17.6l2.842-5.686c.248-.496.222-1.085-.07-1.557-.29-.472-.806-.758-1.36-.758h-8V4.8c0-.886-.717-1.6-1.6-1.6H3.597l-.434-1.95C2.97.39 2.115-.148 1.253.036.393.228-.15 1.082.04 1.946l6.4 28.8C6.603 31.49 7.268 32 8 32c.115 0 .23-.014.347-.04.862-.19 1.406-1.045 1.216-1.908L7.153 19.2h4.05V24c0 .882.714 1.6 1.6 1.6h17.6c.553 0 1.068-.29 1.36-.76.292-.473.317-1.062.07-1.558L28.99 17.6z"></path>
               </svg>
            </symbol>
         </svg>
      </div>
		@if( $notification != '' ) 
		<div class="ui-flash-wrapper" id="UIFlashWrapper">
		   <div class="ui-flash ui-flash--nav-offset" id="UIFlashMessage" data-tg-refresh-always="true">
			  <p class="ui-flash__message" tabindex="-1" aria-live="off">{{ $notification }}</p>
		   </div>
		</div>
			<script>
				$("#UIFlashWrapper").fadeIn(1000).delay(3000).fadeOut(1000);
			</script>
		@endif
		@yield('Script-content')
   </body>
</html>