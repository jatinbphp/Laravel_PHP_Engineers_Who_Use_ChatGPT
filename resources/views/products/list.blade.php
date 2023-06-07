<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>

    <table class="table" id="productsTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">SKU</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
    </table>
    <!-- Add your home page content here -->
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#productsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('fetchProducts') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'sku', name: 'sku' },
                { data: 'price', name: 'price' },
                { data: 'description', name: 'description' },
            ]
        });
    });
</script>
@endsection