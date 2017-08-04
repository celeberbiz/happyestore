@extends('admin.template')

@section('sidebar')
	@include('admin.sidebar')
@stop

@section('content')
<div class="categories">
<a class="add-btn" href="{{ url('/admin/delivery/create') }}">Add Delivery Method</a>
<table class="table">
	<tr id="table-header">
		<td>#</td>
		<td>Name</td>
		<td>Price</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	@foreach($delivery as $del)
	<tr>
		<td>{{ $del->id }}</td>
		<td>{{ $del->name }}</td>
		<td>${{ $del->price }}</td>
		<td><a href="{{ url('/admin/delivery/'.$del->id.'/edit') }}" class="fa fa-pencil-square-o"></a></td>
		<td><a href="{{ url('/delivery/'.$del->id.'/delete') }}" class="fa fa-times"></a></td>
	</tr>
	@endforeach
</table>
{!! str_replace('/?', '?', $delivery->render()) !!}
</div>
@stop

@section('footer')
	<script>
	$(document).ready(function(){
		$('.sidebar #delivery').addClass('active-section');
	});
	</script>
@stop