@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 offset-2">
				<h3>Edit {{ $product->name }}</h3>
				<br>
				{{ Form::model($product, ['route'=>['products.update', $product->id], 'method'=>'put', 'files'=>true]) }}
					@include('products._form', ['model'=> $product])
				{{ Form::close() }}
			</div>	
		</div>
	</div>
@endsection