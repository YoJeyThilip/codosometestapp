<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
	
        <title>Laravel</title>
		
		<link rel="stylesheet" media="screen" href="{{ secure_asset('css/shopify-login.css') }}">

        <!-- Styles -->
        <style>
			
			#container{
			    width: 500px;
				max-width: 90%;
				margin: auto;
			}
			
			.next-input--stylized:focus{
				z-index:2;
			}
			
        </style>
    </head>
    <body>		
		<div id="container">
		   <main role="main" id="dialog-alternate">
			  <div class="login-form">
			<main class="py-4">
				@yield('content')
		</main>
		<div id="global-icon-symbols" data-tg-refresh="global-icon-symbols" data-tg-refresh-always="true" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg"><symbol id="error-major"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="currentColor" d="M19 10c0 4.97-4.030 9-9 9s-9-4.030-9-9c0-4.97 4.030-9 9-9s9 4.030 9 9z"></path><path d="M10 17.5c-1.617 0-3.113-0.52-4.338-1.394l10.444-10.445c0.875 1.226 1.394 2.72 1.394 4.339 0 4.138-3.362 7.5-7.5 7.5zM10 2.5c1.617 0 3.113 0.52 4.338 1.394l-10.442 10.444c-0.876-1.225-1.395-2.719-1.395-4.338 0-4.138 3.362-7.5 7.5-7.5zM10 0c-5.513 0-10 4.487-10 10s4.487 10 10 10c5.512 0 10-4.488 10-10s-4.488-10-10-10z"></path></svg></symbol><symbol id="next-email"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="currentColor" d="M1 3l9 9 9-9z"></path><path d="M2 16V5.414l7.293 7.293c.195.195.45.293.707.293s.512-.098.707-.293L18 5.414V16H2zM16.586 4L10 10.586 3.414 4h13.172zM19 2H1c-.552 0-1 .447-1 1v14c0 .553.448 1 1 1h18c.552 0 1-.447 1-1V3c0-.553-.448-1-1-1z"></path></svg></symbol><symbol id="next-locked"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="currentColor" d="M3 9h14v10H3V9z"></path><path d="M17 8c.553 0 1 .447 1 1v10c0 .553-.447 1-1 1H3c-.553 0-1-.447-1-1V9c0-.553.447-1 1-1h1V6c0-3.31 2.69-6 6-6s6 2.69 6 6v2h1zM4 18h12v-8H4v8zM6 6v2h8V6c0-2.206-1.794-4-4-4S6 3.794 6 6zm4 10c.553 0 1-.447 1-1v-2c0-.553-.447-1-1-1s-1 .447-1 1v2c0 .553.447 1 1 1z"></path></svg></symbol><symbol id="next-checkmark-thick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M23.6 5L22 3.4c-.5-.4-1.2-.4-1.7 0L8.5 15l-4.8-4.7c-.5-.4-1.2-.4-1.7 0L.3 11.9c-.5.4-.5 1.2 0 1.6l7.3 7.1c.5.4 1.2.4 1.7 0l14.3-14c.5-.4.5-1.1 0-1.6z"></path></svg></symbol></svg></div>
    </div>
</body>
</html>
