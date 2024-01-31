  @extends("layouts.{$layout}")
  @section('title', 'Отклоненые')
  @section('content')
  
    <h1>Список товаров | Отклоненые</h1>
    <div class="table-wrap">

      {{ $products->links('vendor.pagination.bootstrap-5') }}
      @yield('table-product')
      {{ $products->links('vendor.pagination.bootstrap-5') }}
    </div>
    
    

  @endsection
