  @extends("layouts.{$layout}")
  @section('title', 'Home')
  @section('content')

    @php
     $usersAll = $adminCount + $banCount + $userCount;
     $productsAll = $productsApprovedCount + $productsRejectedCount + $productsInReviewCount + $productsSalesCount;

     $adminProcent= round(($adminCount * 100) / $usersAll, 2);
     $banProcent= round(($banCount * 100) / $usersAll, 2);
     $userProcent= round(($userCount * 100) / $usersAll, 2);

     $productsApprovedProcent= round(($productsApprovedCount * 100) / $productsAll, 2);
     $productsRejectedProcent= round(($productsRejectedCount * 100) / $productsAll, 2);
     $productsInReviewProcent= round(($productsInReviewCount * 100) / $productsAll, 2);
     $productsSalesProcent= round(($productsSalesCount * 100) / $productsAll, 2);
     $productsWithdrawnProcent= round(($productsWithdrawnCount * 100) / $productsAll, 2);
     $productsExpiredProcent= round(($productsExpiredCount * 100) / $productsAll, 2);

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
              <a href="{{ route('productsApproved') }}" style="height: {{ $productsApprovedProcent }}%" class="green" title="Опубликовано: {{ $productsApprovedCount }}"> <span>{{ $productsApprovedCount }}</span></a>
              <a href="{{ route('productsInReview') }}" style="height: {{ $productsInReviewProcent }}%" class="yellow" title="На проверке: {{ $productsInReviewCount }}"> <span>{{ $productsInReviewCount }}</span></a>
              <a href="{{ route('productsRejected') }}" style="height: {{ $productsRejectedProcent }}%" class="red" title="Скрыто: {{ $productsRejectedCount }}"> <span>{{ $productsRejectedCount }}</span></a>
              <a href="{{ route('productsSales') }}" style="height: {{ $productsSalesProcent }}%" class="blue" title="Продано: {{ $productsSalesCount }}"> <span>{{ $productsSalesCount }}</span></a>
              <a href="{{ route('null') }}" style="height: {{ $productsWithdrawnProcent }}%" class="gray" title="Cнято с продажи: {{ $productsWithdrawnCount }}"> <span>{{ $productsWithdrawnCount }}</span></a>
              <a href="{{ route('productsExpired') }}" style="height: {{ $productsExpiredProcent }}%" class="purple" title="Cрок истек: {{ $productsExpiredCount }}"> <span>{{ $productsExpiredCount }}</span></a>

            </div>             
          </div>
      </div>
    </div>
    <p>
      
    </p>
    
  @endsection
