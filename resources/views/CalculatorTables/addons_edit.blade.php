@extends('layouts.dashboard')

@section('dashboard-content')

<div class="addons_table edit_tables">

<h1 class="product_calculator_header">Addons Table Item</h1>

<form action="{{ route('calculator-tables') }}?tab=addons" method="post">
	@csrf
	<table id="dt_basic" class="table table-striped table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
		
		<tbody>
			@foreach( $addons as $addon )	
				@if( $addons_edit_id == $addon->id )
					<tr>
						<td>ID</td>
						<td>
							<span>{{$addon->id}}</span>
							<input type="hidden" name="id" value="{{$addon->id}}">
						</td>
					</tr>
					<tr>
						<td>Add on</td>
						<td><input type="text" name="add_on"  value="{{ $addon->add_on }}"></td>
					</tr>
					<tr>
						<td>Prize</td>
						<td><input type="text" name="prize" value="{{ $addon->prize }}"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="hidden"  name="table_name" value="addons">
							<input type="submit" class="update" name="update" value="Update">
						</td>
					</tr>
				@endif
			@endforeach
		
		</tbody>
	</table>
</form>
</div>
				
@endsection