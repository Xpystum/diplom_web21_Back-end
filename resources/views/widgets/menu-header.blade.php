    @extends("layouts.{$layout}")
    
    @section('menu-header')

    <ul class="accordion" id="accordion">
        <li><a href="{{ route('home') }}" class="@if(Request::url() == route('home')) active @endif" title="Главная"><i class="fa-solid fa-table-columns"></i><span class="text-menu">Главная</span></a></li>
        <li class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed @if(Request::url() == route('widgets')) active @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa-solid fa-diagram-successor"></i><span class="text-menu">Модульная сетка</span>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse @if(Request::url() == route('widgets')) show @endif" data-bs-parent="#accordion">
                <ul class="accordion-body">
                    <li><a href="{{ route('widgets') }}" class="@if(Request::url() == route('widgets')) active @endif"><i class="fa-solid fa-house"></i><span class="text-menu">Главная</span></a></li>
                    <li><a href="{{ route('widgets') }}" class="@if(Request::url() == route('widgets')) active @endif"><i class="fa-solid fa-store"></i><span class="text-menu">Список Продуктов</span></a></li>
                    <li><a href="{{ route('widgets') }}" class="@if(Request::url() == route('widgets')) active @endif"><i class="fa-solid fa-house-user"></i><span class="text-menu">Личный кабинет</span></a></li>
                </ul>
            </div>
        </li>
        <li class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed @if(Request::url() == route('products') || Request::url() == route('productsGreen') || Request::url() == route('productsRed')) active @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa-solid fa-cart-flatbed"></i><span class="text-menu">Товары</span>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse @if(Request::url() == route('products') || Request::url() == route('productsGreen') || Request::url() == route('productsRed')) show @endif" data-bs-parent="#accordion">
            <ul class="accordion-body">
                <li><a href="{{ route('productsGreen') }}" class="@if(Request::url() == route('productsGreen')) active @endif"><i class="fa-solid fa-circle-check"></i><span class="text-menu">Одобренные</span></a></li>
                <li><a href="{{ route('products') }}" class="@if(Request::url() == route('products')) active @endif"><i class="fa-solid fa-circle-question"></i><span class="text-menu">В ожидании</span></a></li>
                <li><a href="{{ route('productsRed') }}" class="@if(Request::url() == route('productsRed')) active @endif"><i class="fa-solid fa-circle-xmark"></i><span class="text-menu">Отложенные</span></a></li>
            </ul>
            </div>
        </li>
        <li class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed @if(Request::url() == route('user') || Request::url() == route('userAdmin') || Request::url() == route('userBan'))active @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fa-solid fa-user-pen"></i><span class="text-menu">Пользователи</span>
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse  @if(Request::url() == route('user') || Request::url() == route('userAdmin') || Request::url() == route('userBan'))show @endif" data-bs-parent="#accordion">
            <ul class="accordion-body">
                <li><a href="{{ route('userAdmin') }}" class="@if(Request::url() == route('userAdmin')) active @endif"><i class="fa-solid fa-users-gear"></i><span class="text-menu">Админы</span></a></li>
                <li><a href="{{ route('user') }}" class="@if(Request::url() == route('user')) active @endif"><i class="fa-solid fa-users"></i><span class="text-menu">Клиенты</span></a></li>
                <li><a href="{{ route('userBan') }}" class="@if(Request::url() == route('userBan')) active @endif"><i class="fa-solid fa-users-slash"></i><span class="text-menu">Баны</span></a></li>
            </ul>
            </div>
        </li>
        <li><a href="{{ route('database') }}" class="@if(Request::url() == route('database')) active @endif"><i class="fa-solid fa-database"></i><span class="text-menu">База данных</span></a></li>
        <li><a href="{{ route('null') }}" class="@if(Request::url() == route('null')) active @endif"><i class="fa-solid fa-comment"></i><span class="text-menu">Комментарии</span></a></li>
        <li><a href="{{ route('null') }}" class="@if(Request::url() == route('null')) active @endif"><i class="fa-solid fa-pen-ruler"></i><span class="text-menu">123</span></a></li>
    </ul> 
@endsection