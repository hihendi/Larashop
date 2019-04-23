@extends('layouts.app')

@section('title', 'New Product')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 offset-2">
				<h3>New Category</h3>
				<hr>
				{{ Form::open(['route'=>'products.store', 'files'=>true]) }}
						@include('products._form')
				{{ Form::close() }}
			</div>	
		</div>
	</div>
@endsection