  @extends("layouts.{$layout}")
  @section('title', 'Home')
  @section('content')

    @php
     $usersAll = $adminCount + $banCount + $userCount;
     $productsAll = $productGreenCount + $productRedCount + $productCount;

     $adminProcent= round(($adminCount * 100) / $usersAll, 2);
     $banProcent= round(($banCount * 100) / $usersAll, 2);
     $userProcent= round(($userCount * 100) / $usersAll, 2);

     $productGreenProcent= round(($productGreenCount * 100) / $productsAll, 2);
     $productRedProcent= round(($productRedCount * 100) / $productsAll, 2);
     $productProcent= round(($productCount * 100) / $productsAll, 2);
    @endphp

    <h1>HOME</h1>
    <div class="container">
      <div class="row">
          <div class="col">
            <span>Пользователи:  {{ $usersAll }} </span>
            <div class="line">
              <a href="{{ route('userAdmin') }}" style="height: {{ $adminProcent }}%" class="green" title="Админов: {{ $adminCount }}"> <span>{{ $adminCount }}</span></a>
              <a href="{{ route('user') }}" style="height: {{ $userProcent }}%" class="yellow" title="Юзеров: {{ $userCount }}"> <span>{{ $userCount }}</span></a>
              <a href="{{ route('userBan') }}" style="height: {{ $banProcent }}%" class="red" title="В бане: {{ $banCount }}"> <span>{{ $banCount }}</span></a>
            </div>
          </div>
          <div class="col">
            <span>Обьявлений: {{ $productsAll }}</span>
            <div class="line">
              <a href="{{ route('productsGreen') }}" style="height: {{ $productGreenProcent }}%" class="green" title="Опубликовано: {{ $productGreenCount }}"> <span>{{ $productGreenCount }}</span></a>
              <a href="{{ route('products') }}" style="height: {{ $productProcent }}%" class="yellow" title="На проверке: {{ $productCount }}"> <span>{{ $productCount }}</span></a>
              <a href="{{ route('productsRed') }}" style="height: {{ $productRedProcent }}%" class="red" title="Скрыто: {{ $productRedCount }}"> <span>{{ $productRedCount }}</span></a>
            </div>             
          </div>
      </div>
    </div>
    <p>
      
    </p>
    
  @endsection
