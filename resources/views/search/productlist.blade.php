<ul class="list-group mt-5">
@if(count($products) > 0)
    @foreach($products as $product)
      <li class="list-group-item">{{ $product->name }} </li>
    @endforeach
@else
  <li class="list-group-item"> No any products found. </li>
@endif
</ul>