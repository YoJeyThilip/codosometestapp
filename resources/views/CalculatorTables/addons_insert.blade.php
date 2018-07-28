@extends('layouts.dashboard')

@section('dashboard-content')

	<div class="addons_table edit_tables">

		<h1 class="product_calculator_header">Addons Table Item</h1>

		<form action="{{ route('calculator-tables') }}?tab=addons" method="post">
			@csrf
			<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
				
				<tbody>
					
					<tr>
						<td>Add on</td>
						<td><input type="text" name="add_on"  value="" required>
							<input name="insert_table" type="hidden" id="id" value="addons"></td>
					</tr>
					<tr>
						<td>Prize</td>
						<td><input type="number" name="prize" value="" required></td>
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