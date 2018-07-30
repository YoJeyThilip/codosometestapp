@extends('layouts.dashboard')

@section('dashboard-content')

	<div class="calculator_fabric_table edit_tables">

		<h1 class="product_calculator_header">Calculator Fabric Table Item</h1>

		<form action="{{ route('calculator-tables') }}?tab=calculator_fabric" method="post">
			@csrf
			<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
				<tbody>
					
					<tr>
						<td>front</td>
						<td><input type="text" name="front"  value="" required>
							<input name="insert_table" type="hidden" id="id" value="calculator_fabric"></td>
					</tr>
					<tr>
						<td>back</td>
						<td><input type="text" name="back"  value="" required>
							</td>
					</tr>
					<tr> 
						<td>Light Fabric Non Online 25</td>
						<td><input type="number" name="light_fabric_non_online_25"  value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Non Online 50</td>
						<td><input type="number" name="light_fabric_non_online_50"  value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Non Online 100</td>
						<td><input type="number" name="light_fabric_non_online_100"  value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Non Online 150</td>
						<td><input type="number" name="light_fabric_non_online_150"  value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Non Online 25</td>
						<td><input type="number" name="dark_fabric_non_online_25"  value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Non Online 50</td>
						<td><input type="number" name="dark_fabric_non_online_50"  value="" required></td> 
					</tr>
					<tr>
						<td>Dark Fabric Non Online 100</td>
						<td><input type="number" name="dark_fabric_non_online_100"  value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Non Online 150</td>
						<td><input type="number" name="dark_fabric_non_online_150"  value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Online 25</td>
						<td><input type="number" name="light_fabric_online_25"  value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Online 50</td>
						<td><input type="number" name="light_fabric_online_50"  value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Online 100</td>
						<td><input type="number" name="light_fabric_online_100" value="" required></td>
					</tr>
					<tr>
						<td>Light Fabric Online 150</td>
						<td><input type="number" name="light_fabric_online_150"  value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 25</td>
						<td><input type="number" name="dark_fabric_online_25"  value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 50</td>
						<td><input type="number" name="dark_fabric_online_50"  value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 100</td>
						<td><input type="number" name="dark_fabric_online_100" value="" required></td>
					</tr>
					<tr>
						<td>Dark Fabric Online 150</td>		
						<td><input type="number" name="dark_fabric_online_150"  value="" required></td>
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