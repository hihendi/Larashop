@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 offset-2">
				<br>
				<h3>Category <small><a href=" {{ route('categories.create') }} " title="" class="btn btn-warning">New Category</a></small></h3>
				<br>
				{!! Form::open(['url'=>'categories', 'method'=>'get', 'class'=>'form-inline']) !!}
					<div class="form-group {!! $errors->has('q') ? 'has-error': '' !!}">
						{{ Form::text('q', isset($q) ? $q : null, ['class'=>'form-control mr-sm-2', 'type'=>'search', 'placeholder'=>'Search']) }}
						{{ $errors->first('q', '<p class="help-block">:message</p>') }} 
					</div>
					{{ Form::submit('Search', ['class'=>'btn btn-outline-success']) }}
				{!! Form::close() !!}
				<br>
				<table class="table">
					<thead class="table table-dark">
						<tr>
							<th>Name</th>
							<th>Parent</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categories as $category)
						<tr>
							<td>{{ $category->name }}</td>
							<td>{{ $category->parent ? $category->root->name : "" }}</td>
							<td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a> |
								{{ Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete', 'id'=>$category->id]) }}
									{{ Form::submit("Delete", ['class'=>"btn btn-danger btn-sm sweetalert_delete", 'data-formid'=>$category->id]) }}
								{{ Form::close() }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					{{ $categories->appends(compact('q'))->links() }}
				</div>
			</div>			
		</div>
	</div>
@endsection