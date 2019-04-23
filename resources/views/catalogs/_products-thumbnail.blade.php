<div class="card">
	<img src="{{ $product->photo_path }}" alt="{{ $product->name }}" class="card-img-top rounded" style="height: 250px">
	<div class="card-body pt-1">
		<h4 class="card-title">{{ $product->name }}</h4>
		<p class="card-text">{{ $product->model }}</p>
		<p class="card-text"><b>Rp {{ number_format($product->price,2)  }}</b></p>
		<p class="card-text">Category: 
					
				@forelse ($product->category as $category)
						<span class="badge badge-primary">
						<i class="fa fa-tags"></i> {{ $category->name }}
					</span>
						@empty
						-
				@endforelse
					
			
		</p>
	</div>
</div>