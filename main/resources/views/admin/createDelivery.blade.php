@extends('admin.template')

@section('sidebar')
	@include('admin.sidebar')
@stop

@section('content')
<div class="container-fluid add-product">
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>	
			@endforeach
			</ul>
		</div>
	@endif
	<form action="{{url('/delivery/create')}}" method="post">
	<div class="row">
		<div class="form-group col-md-5">
			<label for="name" class=" control-label">Delivery Method : </label>
			<input id="name" type="text" class="form-control" name="name">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-5">
			<label for="name" class="control-label">Price : </label>
			<input id="price" type="text" class="form-control" name="price">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-5">
			<input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Add Delivery Method">
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	</form>
</div>
@stop

@section('footer')
	<script>
	$(document).ready(function(){
		$('.sidebar #delivery').addClass('active-section');
	});
	</script>
@stop
