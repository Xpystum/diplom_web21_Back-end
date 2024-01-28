  @extends("layouts.{$layout}")
  @section('title', 'products')
  @section('content')
  
  <h1><i class="fa-solid fa-circle-check"></i> Список товаров | Одобренные</h1>
    <div class="table-wrap">
      {{ $products->links('vendor.pagination.bootstrap-5') }}
      <table class="table">
        <thead class="col-12">
          <tr>
            <td>ID</td>
            <td>Фото</td>
            <td>Бренд</td>
            <td>Модель</td>
            <td>Год</td>
            <td>Цена</td>
            <td>Статус</td>
            <td>Действие</td>        
          </tr> 
        </thead>
        <tbody  class="col-12">
          @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>
                  <div>
                    @if($product->main_img)
                        <img src="{{ asset('storage/images/'.$product->main_img) }}" class='product__img' alt="logo">
                    @else
                        <div class='product__no-img'>Нет фото</div>
                    @endif
                  </div>
                </td>
                <td>
                  @if($product->brand->img_dark)
                    <img src="{{ asset('storage/images/'.$product->brand->img_dark) }}" alt="logo">
                  @else
                    @if($product->brand->img_light)
                      <img src="{{ asset('storage/images/'.$product->brand->img_light) }}" alt="logo">
                    @else
                      {{ $product->brand->name }}
                    @endif
                  @endif
                </td>
                <td>{{ $product->model->name }}</td>
                <td>{{ $product->year }}</td>
                <td>
                  <span class="price">
                    {{ $product->price }} &#8381;
                    @if($product->old_price)
                      <span class="old_price">{{ $product->old_price }} &#8381;</span> 
                    @endif
                  </span>
                </td>
                <td>
                  <span class="status status-{{ $product->moderation_status_id }} ">
                    @if($product->moderation_status_id == 1)
                      <i class="fa-solid fa-check"></i> идут показы
                    @endif
                    @if($product->moderation_status_id == 2)
                      <i class="fa-solid fa-xmark"></i> не прошло модерацию
                    @endif
                    @if($product->moderation_status_id == 3)
                      <i class="fa-solid fa-circle-info"></i> на модерации
                    @endif
                    @if($product->moderation_status_id == 4)
                      <i class="fa-solid fa-money-bill"></i> продано
                    @endif
                    @if($product->moderation_status_id == 5)
                      <i class="fa-brands fa-creative-commons-nc"></i> снято с продажи
                    @endif
                    @if($product->moderation_status_id == 6)
                      <i class="fa-solid fa-calendar-xmark"></i> срок размещения истек
                    @endif
                  </span>
                </td>
                

                <td>
                    <a href="{{ route('product', ['id' => $product->id]) }}" class='revise' title="Просмотреть"><i class="fa-solid fa-eye"></i></a>
                    {{-- <button href="#" class='change' title="Изменить"><i class="fa-solid fa-up-right-from-square"></i></button>
                    <button href="#" class='remove' title="Удалить"><i class="fa-solid fa-x"></i></button> --}}
                </td>
              </tr>
          @endforeach  
        </tbody>
        
      </table>
      {{ $products->links('vendor.pagination.bootstrap-5') }}
    </div>
    
    

  @endsection
