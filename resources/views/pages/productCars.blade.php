  @extends("layouts.{$layout}")
  @section('title', 'test')
  @section('content')
  
    <span><a href="javascript:history.back()" class="back"><i class="fa-solid fa-chevron-left"></i></a> ID: {{$product->id}}</span> 
    <div class="status">
      <form action="{{ route('update-product-status', $product->id) }}" class="form__status" method="POST">
        @csrf
        @method('PUT')
          <select name="status"  id="statusSelect" class="{{ $product->moderation_status }} status form-select form-select-lg " aria-label="Default select">
              <option value="in_review" {{ $product->moderation_status == 'in_review' ? 'selected' : '' }}>Ожидает...</option>
              <option value="approved" {{ $product->moderation_status == 'approved' ? 'selected' : '' }}>Отоброжен</option>
              <option value="rejected" {{ $product->moderation_status == 'rejected' ? 'selected' : '' }}>Отклонен</option>
          </select>
      </form>
    </div>  
    <script>
      var statusSelect = document.getElementById('statusSelect');
  
      statusSelect.addEventListener('change', function() {
          // Отправка формы при изменении значения в списке
          this.form.submit();
      });
    </script>
      

    <h1>
      @if($product->brand->img_dark)
          <img src="{{ asset('storage/images/'.$product->brand->img_dark) }}" alt="logo">
      @else
        @if($product->brand->img_light)
          <img src="{{ asset('storage/images/'.$product->brand->img_light) }}" alt="logo">
        @endif
      @endif {{ $product->brand->name }} {{$product->model->name}} , {{$product->year}}г.</h1>
    
    
    <div class="flex">
      <div id="carouselControls" class="carousel slide  card__img" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="img__wrap">
              <img src="{{ asset('storage/images/'.$product->main_img) }}" class='img d-block w-100' alt="logo">
            </div>
          </div>
          @foreach ($product->imgCollection as $img)
          <div class="carousel-item">
            <div class="img__wrap">
              <img src="{{ asset('storage/images/'.$img->resource ) }}" class='img d-block w-100' alt="">
            </div>
          </div>
        @endforeach  
          
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Следующий</span>
        </button>
      </div>
      <div class="card__info">
        <p>Цена: {{ $product->price }} &#8381;</p>
          @if($product->old_price)
              Цена(min): <span class="old_price">{{ $product->old_price }} &#8381;</span>
          @endif
        </p>
        <p>Пробег: {{$product->mileage}} km</p>
        <p>{{ $product->desription}}</p>
        {{-- <p>{{ $product }}</p> --}}
        
      </div>
    </div>
    
    

    
  @endsection
