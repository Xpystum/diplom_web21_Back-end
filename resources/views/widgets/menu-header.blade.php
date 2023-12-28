    @extends("layouts.{$layout}")
    
    @section('menu-header')

    <ul>
        <li><a href="{{ route('home') }}" class="@if(Request::url() == route('home')) active @endif"><i class="fa-solid fa-table-columns"></i><span class="text-menu">Главная</span></a></li>
        <li><a href="{{ route('user') }}" class="@if(Request::url() == route('user')) active @endif"><i class="fa-solid fa-user-pen"></i><span class="text-menu">Клиенты</span></a></li>        
        <li><a href="{{ route('widgets') }}" class="@if(Request::url() == route('widgets')) active @endif"><i class="fa-solid fa-cubes"></i><span class="text-menu">Виджеты</span></a></li>
        <li><a href="{{ route('null') }}" class="@if(Request::url() == route('null')) active @endif"><i class="fa-solid fa-boxes-packing"></i></i><span class="text-menu">Товары на проверке</span></a></li>
        <li><a href="{{ route('products') }}" class="@if(Request::url() == route('products')) active @endif"><i class="fa-solid fa-box"></i><span class="text-menu">Товары</span></a></li>
        
        <li><a href="{{ route('database') }}" class="@if(Request::url() == route('database')) active @endif"><i class="fa-solid fa-database"></i><span class="text-menu">База данных</span></a></li>
        
        <li><a href="{{ route('null') }}" class="@if(Request::url() == route('null')) active @endif"><i class="fa-solid fa-comment"></i><span class="text-menu">Комментарии</span></a></li>
        <li><a href="{{ route('null') }}" class="@if(Request::url() == route('null')) active @endif"><i class="fa-solid fa-pen-ruler"></i><span class="text-menu">123</span></a></li>
    </ul>

@endsection