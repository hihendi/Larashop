@extends('layouts.app')

@section('title', 'Create Categories')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 offset-2">
				<h3 class="text-center text-primary">New Category</h3>
				<hr>
				{{ Form::open(['route'=>'categories.store']) }}
					@include('categories._form')
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection