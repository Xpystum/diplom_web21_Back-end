  @extends("layouts.{$layout}")
  @section('title', 'Admins')
  @section('content')
  
    <h1><i class="fa-solid fa-id-card"></i> Админы</h1>
    <div class="table-wrap">
      {{ $dbUsers->links('vendor.pagination.bootstrap-5') }}
      @yield('table-user') 
    </div>
  @endsection
