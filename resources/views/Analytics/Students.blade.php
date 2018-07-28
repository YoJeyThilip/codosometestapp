@extends('layouts.dashboard')

@section('dashboard-content')

<div class="Polaris-Page ui-layout--full-width">
	<div class="Polaris-Page__Header">
		<div class="Polaris-Page__Title">
			<h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Analytics</h1>
		</div>
		<div class="Polaris-Page__Actions"></div>
	</div>
	<div id="this_year_chartContainer" style="height: 300px; width: 100%;">
	</div>
</div>

<div class="Polaris-Page ui-layout--full-width">
	<div class="Polaris-Page__Header">
		<div class="Polaris-Page__Title">
			<h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Analytics</h1>
		</div>
		<div class="Polaris-Page__Actions"></div>
	</div>
	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
</div>

@endsection

@section('Script-content')

	<script src="{{ secure_asset('js/canvasjs.min.js') }}"></script>

	<script>

		var this_year_chart = new CanvasJS.Chart("this_year_chartContainer", {
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
				xValueFormatString: "DD MMM Y",
				yValueFormatString: "\"$ \"#,##0.##",
				dataPoints: [
					@foreach( $Analytics_this_month as $key => $Analytics_per_order )
						{ x: {{ $key }}000, y: {{ $Analytics_per_order }} },
					@endforeach
				]
			}]
		});
		
		this_year_chart.render();

		var chart = new CanvasJS.Chart("chartContainer", {
			zoomEnabled: true, 
			animationEnabled: true,
			title: {
				text: "Total order amount"
			},
			axisX: {
				ValueType: "dateTime",
				valueFormatString: "DD MMM Y"
			},
			axisY: {
				suffix: "K",
				valueFormatString: "\"$ \"#0,.",
			},
			data: [{
				type: "line",
				name: "Total order amount",
				connectNullData: true,
				xValueType: "dateTime",
				xValueFormatString: "DD MMM Y",
				yValueFormatString: "\"$ \"#,##0.##",
				dataPoints: [
					@foreach( $Analytics as $key => $Analytics_per_order )
						{ x: {{ $key }}000, y: {{ $Analytics_per_order }} },
					@endforeach
				]
			}]
		});
		
		chart.render();
		
	</script>

@endsection