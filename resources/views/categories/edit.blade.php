@extends('layouts.app')

@section('title', 'Update Categories')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-8 offset-2">
				<h3 class="text-light text-center">Edit Category</h3>
				<hr>
				{{ Form::model($categories, ['route'=>['categories.update', $categories->id], 'method'=>'put']) }}
					@include('categories._form', ['model' => $categories])
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection