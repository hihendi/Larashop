  <div class="list-group-item list-group-item-heading list-group-item-secondary">
  <h5>List Semua Produk</h5>
  </div>
<div class="list-group">
  <a href="{{ route('catalogs') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Semua Produk <span class="badge badge-info badge-pill">{{ $totalproducts }}</span></a>
  
  
  @foreach ($parents as $parent)
  	<a href="{{ url('/catalogs?cat='.$parent->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $parent->name }}</a>
  @endforeach

</div>