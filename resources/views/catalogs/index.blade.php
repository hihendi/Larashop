@extends('layouts.app')

@section('title', 'Hompage')


@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
				@include('catalogs._category-sidebar')
			</div>
			<div class="col-10">
				<div class="col-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Semua Kategori</li>
					</ol>
				</div>
				<div class="row p-3">
				@foreach ($products as $product)
					<div class="col-4 mb-5">
						@include('catalogs._products-thumbnail', ['product'=>$product])
					</div>	
				@endforeach	
				</div>
				<div class="float-right">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection()