@extends('layouts.dashboard')

@section('dashboard-content')

	<div class="common_items_table edit_tables">

		<h1 class="product_calculator_header">Common Items Table Item</h1>

		<form action="{{ route('calculator-tables') }}?tab=common_items" method="post">
			@csrf
			<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
				<thead>
				</thead>
				<tbody>
					<tr>
						<td>Brand</td>
						<td><input type="text"  name="brand" value="" required>
							<input name="insert_table" type="hidden" id="id" value="common_items"></td>
					</tr>
					<tr>
						<td>Product</td>
						<td><input type="text"  name="product" value="" required></td>
					</tr>
					<tr>
						<td>Cost</td>
						<td><input type="text" name="cost"  value="" required></td>
					</tr>
					<tr>
						<td>Non online Store</td>
						<td><input type="text"  name="non_online_store" value="" required></td>
					</tr>
					<tr>
						<td>Online Store</td>
						<td><input type="text" name="online_store" value="" required></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" class="Save" name="Save" value="Save"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	
@endsection