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
				<div class="Polaris-FormLayout">
					<div class="Polaris-FormLayout__Item">
						<div class="">
						  <div class="Polaris-Labelled__LabelWrapper">
							 <div class="Polaris-Label"><label id="TextField2Label" for="TextField2" class="Polaris-Label__Text">Select a month</label></div>
						  </div>
						  <div class="Polaris-TextField">
							 <input id="analytics-month-picker" class="Polaris-TextField__Input" type="text" value="{{ date( 'M,y' ) }}">
							 <div class="Polaris-TextField__Backdrop"></div>
						  </div>
						  <div class="Polaris-Labelled__HelpText" id="TextField2HelpText"><span>Reports on the following month can be downloaded below.</span></div>
						</div>
				    </div>
				</div>
				
				<button class="download_csv" id="selected_Students_orders_per_month" data-json="{{ json_encode($orders_per_month) }}">Orders this month</button>

				<button class="download_csv" id="selected_orders_per_month" data-json="{{ json_encode($Students_orders_per_month) }}" >Student's orders this month</button>
				
			 </div>
            </section>
         </div>
      </div>
   </div>
</div>

@endsection

@section('Script-content')

	<script>
	
		function convert(str) {
			var mnths = { 
				Jan:"01", Feb:"02", Mar:"03", Apr:"04", May:"05", Jun:"06",
				Jul:"07", Aug:"08", Sep:"09", Oct:"10", Nov:"11", Dec:"12"
			},
			date = str.split(" ");

			return [ mnths[date[1]], date[2], date[3] ].join("/");
		}
	
		$('.analytics_download_footer_action #analytics-month-picker').MonthPicker(
			{ 
				Button: false,
				MaxMonth: 0,
				MonthFormat: "MM,y",
				OnAfterChooseMonth: function(selectedDate) {
					
					$('.download_csv').addClass('loading');
					
					selectedDate = convert(selectedDate+'');
					
					$.ajax({
							
							type: 'POST',
							
							url: "{{ route('ajax') }}",

							headers: {
								"X-CSRF-TOKEN":"{{ csrf_token() }}"
							},
							
							data: {
								action : 'reports_admin',
								selected_date : selectedDate
							},
							
							success: function (json_response) {
								
								response = JSON.parse(json_response);
								
								var SelectedMonthYear = $('.analytics_download_footer_action #analytics-month-picker').MonthPicker('GetSelectedMonthYear');
								
								$('#selected_Students_orders_per_month').data('json',response['Students_orders_per_month']).html('Orders of '+SelectedMonthYear);
								
								$('#selected_orders_per_month').data('json',response['orders_per_month']).html("Student's orders of "+SelectedMonthYear);	
								
								$('.download_csv').removeClass('loading');
								
							}
					});
				},
			}
		);

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