  @extends("layouts.{$layout}")
  @section('title', 'Users')
  @section('content')
  
    <h1><i class="fa-solid fa-person"></i> Пользователи</h1>
    <div class="table-wrap">
      {{ $dbUsers->links('vendor.pagination.bootstrap-5') }}

      @yield('table-user')
      
    </div>
  @endsection
