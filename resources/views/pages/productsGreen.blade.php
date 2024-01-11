  @extends("layouts.{$layout}")
  @section('title', 'products')
  @section('content')
  
    <h1>PRODUCTS</h1>
    <div class="table-wrap">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item {{ $previousPageUrl ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $previousPageUrl }}"><i class="fa-solid fa-angle-left"></i></a>
          </li>
          {{-- {{ $products->links() }} --}}
          <li class="page-item {{ $nextPageUrl ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $nextPageUrl }}"><i class="fa-solid fa-angle-right"></i></a>
          </li>
        </ul>
      </nav>
      Кол-во: {{ count($products) }}
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
                  <span class="{{ $product->moderation_status }} status">
                    @if($product->moderation_status == 'approved')
                    Отоброжен
                    @endif
                    @if($product->moderation_status == 'rejected')
                      Отклонен
                    @endif
                    @if($product->moderation_status == 'in_review')
                      Ожидает...
                    @endif
                  </span>
                </td>
                

                <td>
                    <a href="{{ route('product', ['id' => $product->id]) }}" class='revise' title="Просмотреть"><i class="fa-solid fa-eye"></i></a>
                    <button href="#" class='change' title="Изменить"><i class="fa-solid fa-up-right-from-square"></i></button>
                    <button href="#" class='remove' title="Удалить"><i class="fa-solid fa-x"></i></button>
                </td>
              </tr>
          @endforeach  
        </tbody>
        
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item {{ $previousPageUrl ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $previousPageUrl }}"><i class="fa-solid fa-angle-left"></i></a>
          </li>
          {{-- {{ $products->links() }} --}}
          <li class="page-item {{ $nextPageUrl ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $nextPageUrl }}"><i class="fa-solid fa-angle-right"></i></a>
          </li>
        </ul>
      </nav>
    </div>
    
    

  @endsection
