  @extends("layouts.{$layout}")
  @section('title', 'products')
  @section('content')
  
    <h1>PRODUCTS</h1>
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <td>ID</td>
            <td>Фото</td>
            <td>Бренд</td>
            <td>Модель</td>
            <td>Цена</td>
            <td>Статус</td>
            <td>Описание</td>
            <td>Действие</td>        
          </tr> 
        </thead>
        <tbody>
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
              <td>{{ $product->brand->name }}</td>
              <td>{{ $product->model->name }}</td>
              <td>{{ $product->price }} &#8381;
                  @if($product->old_price)
                     <span class="old_price">{{ $product->old_price }} &#8381;</span> 
                  @endif
                </td>
              <td>
                <select name="status" id="status" class="{{ $product->moderation_status }}  form-select">
                  <option value="in_review" {{ ($product->moderation_status == 'in_review')? 'selected' : '' }}><span class="in_review">Ожидает</span></option>
                  <option value="approved" {{ ($product->moderation_status == 'approved')? 'selected' : '' }}><span class="approved">одобрен</span></option>
                  <option value="rejected" {{ ($product->moderation_status == 'rejected')? 'selected' : '' }}><span class="rejected"></span>отклонен</option>
                </select>
              </td>
              <td>
                {{-- {{ $product->desription }} --}}
              </td>
              <td><button class="change"><i class="fa-solid fa-pen-to-square"></i></button> | <button class="remove"><i class="fa-solid fa-x"></i></button></td>
            </tr>
          @endforeach    
        </tbody>
        
      </table>
      @foreach ($products as $product)
        {{ $product->img_collection }}
        @if ($product->img_collection)
            @foreach($product->img_collection as $image)
              <img src="{{ $image->resource }}" alt="Изображение продукта">
            @endforeach
        @endif
        @break
      @endforeach

    </div>
    
    

  @endsection
