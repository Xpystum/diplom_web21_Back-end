  @extends("layouts.{$layout}")
  @section('title', 'Banned')
  @section('content')
  
    <h1><i class="fa-solid fa-person-circle-xmark"></i> Пользователи в Бане</h1>
    <div class="table-wrap">
      {{ $dbUsers->links('vendor.pagination.bootstrap-5') }}
      @yield('table-user')
    </div>
  @endsection
