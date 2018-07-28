@extends('layouts.dashboard')

@section('dashboard-content')

<div class="Polaris-Page ui-layout--full-width">
	<div class="Polaris-Page__Header">
		<div class="Polaris-Page__Title">
			<h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Analytics</h1>
		</div>
		<div class="Polaris-Page__Actions"></div>
	</div>
	<div class="ui-layout__sections">
      <div class="ui-layout__section">
         <div class="ui-layout__item">
            <section class="ui-card">
				 <div class="reports_payment_footer_action_btn analytics_download_footer_action">
					
					<button class="download_csv" data-json="{{ json_encode($orders_per_month) }}">Orders this month</button>
					
					<button class="download_csv" data-json="{{ json_encode($Students_orders_per_month) }}" >Student's orders this month</button>
					
				 </div>
            </section>
         </div>
      </div>
   </div>
</div>

@endsection

@section('Script-content')

	<script>

		$('.download_csv').click(function(){
			
			var rows = $(this).data('json');
			var filename = $(this).html();
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
			link.setAttribute("download", filename + ".csv" );
			link.innerHTML= "Click Here to download";
			document.body.appendChild(link); // Required for FF

			link.click(); // This will download the data file named "my_data.csv".
			
		});
		
	</script>

@endsection