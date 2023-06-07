<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h1>Search Products</h1>

     <form class="d-flex" id="searchForm">
      <input class="form-control me-2" type="input" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="button">Reset</button>
    </form>
    <div id="searched-data">
        <ul class="list-group mt-5">
            @if(count($products) > 0)
                @foreach($products as $product)
                  <li class="list-group-item">{{ $product->name }} </li>
                @endforeach
            @else
              <li class="list-group-item"> No any products found. </li>
            @endif
        </ul>
    </div>
@endsection
@section('js')
<script>
    let delayTimer;
    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Set CSRF token as default header for all AJAX requests
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': csrfToken
          }
        });
        $("#searchForm button").click(function() {
            $("#searchForm input").val('');
            performSearch();
        });
        $("#searchForm input").keyup(function() {
            clearTimeout(delayTimer);
            delayTimer = setTimeout(performSearch, 500);
        });
    });
    function performSearch() {
      // Get the search query from the input field
      const query = $('#searchForm input').val();

      // Send AJAX request to the server
      $.ajax({
        url: "{{ route('searchProducts') }}", // Replace with your actual server-side search endpoint
        method: 'POST', // or 'GET' depending on your setup
        data: { query: query },
        success: function(response) {
          // Handle the search results
          $("#searched-data").html(response);
        },
        error: function(xhr, status, error) {
          // Handle the error
          console.log(error);
        }
      });
    }

</script>
@endsection