  @extends("layouts.{$layout}")
  @section('title', 'products')
  @section('content')
  
    <h1>PRODUCTS</h1>
    <table>
      <thead>
        <tr>
          <td>id</td>
          <td>статус</td>
          <td>img</td>
          <td colspan="2">brand | model</th>
          <td>описание</td>          
        </tr> 
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>
              <select name="status" id="status" class="{{ $product->moderation_status }}">
                <option value="in_review" {{ ($product->moderation_status == 'in_review')? 'selected' : '' }}><span class="in_review">Ожидает</span></option>
                <option value="approved" {{ ($product->moderation_status == 'approved')? 'selected' : '' }}><span class="approved">Добавлен</span></option>
                <option value="rejected" {{ ($product->moderation_status == 'rejected')? 'selected' : '' }}><span class="rejected"></span>Исключен</option>
              </select>
            </td>
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
            <td>{{ $product->desription }}</td>
          </tr>
        @endforeach    
      </tbody>
      
    </table>
    

  @endsection
