@extends('layouts.app')

@section('title', 'All Products')

@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-10 offset-2">
					<br>
					<h3>Product <small><a href="{{ route('products.create') }}" class="btn btn-warning btn-sm">New Product</a></small> </h3>
					<br>
					{{ Form::open(['url'=>'products', 'method'=>'get', 'class'=>'form-inline']) }}
						<div class="form-group {{ $errors->has('q') ? 'has->error' : '' }} ">
							{{ Form::text('q', isset($q) ? $q : null, ['class'=>'form-control mr-sm-2', 'type'=>'search', 'placeholder'=>'Type name / model']) }}
							{{ $errors->first('q', '<p class="help-block">:message</p>') }}
						</div>
						{{ Form::submit('Search', ['class'=>'btn btn-outline-primary']) }}
					{{ Form::close() }}
					<br>
					<table class="table">
						<thead class="table table-dark">
							<tr>
								<th>Name</th>
								<th>Model</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
								<tr>
									<td>{{ $product->name }}</td>
									<td>{{ $product->model }}</td>
									<td>
										@foreach ($product->category as $category)
											<span class="badge badge-primary"><i class="fa fa-tags"></i> {{ $category->name }}</span>
										@endforeach
									</td>
									<td> <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a> | 
										{{ Form::open(['route'=>['products.destroy', $product->id], 'method'=>'delete', 'id'=>$product->id]) }}
											{{ Form::submit('Delete', ['class'=>'btn btn-danger btn-sm sweetalert_delete', 'data-formid'=>$product->id ]) }}
										{{ Form::close() }}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
						{{ $products->appends(compact('q'))->links() }}
					</div>
				</div>
			</div>
		</div>
@endsection