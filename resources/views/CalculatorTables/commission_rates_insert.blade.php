@extends('layouts.dashboard')

@section('dashboard-content')

	<div class="commission_rates_table edit_tables">

		<h1 class="product_calculator_header">Commission Rates Table Item</h1>

		<form action="{{ route('calculator-tables') }}?tab=commission_rates" method="post">
			@csrf
			<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
				
				<tr>
					<td>Shirts</td>
					<td><input type="text"  name="shirts" value="" required>
						<input name="insert_table" type="hidden" id="id" value="commission_rates"></td>
				</tr>
				<tr>
					<td>Fabric</td>
					<td><input type="text"  name="rate" value="" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit"  class="Save" name="Save" value="Save"></td>
				</tr>
			</table>
		</form>
	</div>
	
@endsection