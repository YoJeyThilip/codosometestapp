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
    </div>
</body>
</html>
