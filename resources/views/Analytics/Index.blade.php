@extends('layouts.dashboard')

@section('dashboard-content')

<div class="Polaris-Page ui-layout--full-width">
	<div class="Polaris-Page__Header">
		<div class="Polaris-Page__Title">
			<h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Analytics</h1>
		</div>
		<div class="Polaris-Page__Actions"></div>
	</div>
	<div class="Polaris-Card__Section">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	</div>
</div>

@endsection

@section('Script-content')

	<script src="{{ secure_asset('js/canvasjs.min.js') }}"></script>
	
	<script>

		window.onload = function() {

			var chart = new CanvasJS.Chart("chartContainer", {
				zoomEnabled: true, 
				animationEnabled: true,
				title: {
					text: "Total order amount 2018"
				},
				axisX: {
					ValueType: "dateTime",
					valueFormatString: "DD MMM"
				},
				axisY: {
					suffix: "K",
					valueFormatString: "\"$ \"#0,.",
				},
				data: [{
					type: "line",
					name: "Total order amount 2018",
					connectNullData: true,
					xValueType: "dateTime",
					xValueFormatString: "DD MMM",
					yValueFormatString: "\"$ \"#,##0.##",
					dataPoints: [
						@foreach( $year_graph as $order )
							{ x: {{ strtotime( $order['created_at'] ) }}000, y: {{ $order['order_total'] }} },
						@endforeach
					]
				}]
			});
			chart.render();

		}
	</script>
@endsection