  @extends("layouts.{$layout}")
  @section('title', 'На модерации')
  @section('content')
  
    <h1><i class="fa-solid fa-spinner"></i> Список товаров | Ожидает подтверждения</h1>
    <div class="table-wrap">
      {{ $products->links('vendor.pagination.bootstrap-5') }}
      @yield('table-product')
    </div>
    
    

  @endsection
