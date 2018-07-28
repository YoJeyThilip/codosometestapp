@extends('layouts.dashboard')

@section('dashboard-content')

	<div class="commission_rates_table edit_tables">

		<h1 class="product_calculator_header">Commission Rates Table Item</h1>

		<form action="{{ route('calculator-tables') }}?tab=commission_rates" method="post">
			@csrf
			<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
					@foreach( $commission_rates as $rate )	
						@if( $commission_rates_edit_id == $rate->id )
							<tr>
								<td>ID</td>
								<td>
									<span>{{$rate->id}}</span>
									<input type="hidden"  name="id" value="{{$rate->id}}">
								</td>
							</tr>
							<tr>
								<td>Shirts</td>
								<td><input type="text"  name="shirts" value="{{$rate->shirts}}"></td>
							</tr>
							<tr>
								<td>Fabric</td>
								<td><input type="text"  name="rate" value="{{$rate->rate}}"></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="hidden"  name="table_name" value="commission_rates">
									<input type="submit" class="update" name="update" value="Update">
								</td>
							</tr>
							
						@endif
					@endforeach
			</table>
		</form>
		
	</div>
				
@endsection