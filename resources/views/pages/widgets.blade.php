  @extends("layouts.{$layout}")
  @section('title', 'widgets')
  @section('content')


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <h1>WIDGETS</h1>

    <ul id="widget-list">
      <li class="widget">Виджет 1</li>
      <li class="widget">Виджет 2</li>
      <li class="widget">Виджет 3</li>
    </ul>
    
    <ul id="position-list">
        <li class="position">Позиция 1</li>
        <li class="position">Позиция 2</li>
        <li class="position">Позиция 3</li>
    </ul>
    <style>
      .module{
        width: 300px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
      }
      .main-module-grid{
        grid-template-rows: repeat(4, 40px) 300px 40px;
        grid-template-areas:
          "title title title"
          "header header header"
          "head-top-one head-top-one head-top-one"
          "head-top-two head-top-two head-top-two"
          "content content extra"
          "footer footer footer";
      }
      .product-module-grid{
        grid-template-rows: repeat(4, 40px) 300px 40px;
        grid-template-areas:
          "title title title"
          "header header header"
          "head-top-one head-top-one head-top-one"
          "head-top-two head-top-two head-top-two"
          "content content ."
          "footer footer footer";
      }
      .cabinet-module-grid{
        grid-template-rows: repeat(4, 40px) 300px 40px;
        grid-template-areas:
          "title title title"
          "header header header"
          "head-top-one head-top-one head-top-one"
          "head-top-two head-top-two head-top-two"
          "content content extra"
          "footer footer footer";
      }
      .module > div{
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid #ccc;
      }
      .product-module-grid .extra{
        display: none;
      }
      .header {
        grid-area: header;
      }
      .header-top-one{
        grid-area: head-top-one;
      }
      .header-top-two{
        grid-area: head-top-two;
      }
      .content{
        grid-area: content;
      }
      .title{
        grid-area: title;
      }
      .extra{
        grid-area: extra;
      }
      .footer{
        grid-area: footer;
      }
    </style>
    <div class="flex">
      <div class="main-module-grid module">
        <h2 class="title">Главная</h2>
        <div class="header">header</div>
        <div class="header-top-one">city position</div>
        <div class="header-top-two">carusel</div>
          <div class="content">
            <div>
              поиск обьявления
            </div>  
            <div>
              Новые автомобили от дилеров
            </div>
            <div>
              Отзывы владельцев авто
            </div>
            <div>
              Автоновости
            </div>
            <div>
              Тест-драйвы и статьи
            </div>
            <div>
              Автопутешествия
            </div>
            <div>
              Автоспорт
            </div>
            <div>
              Запчасти
            </div>
            <div>
              Шины
            </div>
          </div>
          <div class="extra">
            <div>
              Проверь авто перед покупкой
            </div>
            <div>
              Сегодня на автофорумах
            </div>
            <div>
              Ваш пол?
            </div>
            <div>
              Блоги «русских» машин на Дроме
            </div>
          </div>
        <div class="footer">footer</div>
      </div>
      <div class="product-module-grid module">
        <h2 class="title"> Список Продуктов</h2>
        <div class="header">header</div>
        <div class="header-top-one">city position</div>
        <div class="header-top-two">filter</div>
          <div class="content">
            <div>content</div>
          </div>
          <div class="extra">
            <div>
              Проверь авто перед покупкой
            </div>
            <div>
              Сегодня на автофорумах
            </div>
            <div>
              Ваш пол?
            </div>
            <div>
              Блоги «русских» машин на Дроме
            </div>
          </div>
        <div class="footer">footer</div>
      </div>
      <div class="cabinet-module-grid module">
        <h2 class="title">Личный кабинет</h2>
        <div class="header">header</div>
        <div class="header-top-one">city position</div>
        <div class="header-top-two">filter</div>
          <div class="content">
            <div>content</div>
          </div>
          <div class="extra">
            <div>
              Проверь авто перед покупкой
            </div>
            <div>
              Сегодня на автофорумах
            </div>
            <div>
              Ваш пол?
            </div>
            <div>
              Блоги «русских» машин на Дроме
            </div>
          </div>
        <div class="footer">footer</div>
      </div> 
    </div>
    
    <script>
      $(function() {
          $(".widget, .position").draggable({
              revert: "invalid"
          });

          $("#position-list").droppable({
              accept: ".widget",
              drop: function(event, ui) {
                  // выполнение нужных действий при сбросе виджета в позицию
              }
          });

          $("#widget-list").droppable({
              accept: ".position",
              drop: function(event, ui) {
                  // выполнение нужных действий при сбросе позиции в виджет
              }
          });
      });
    </script>
    {{-- <div class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Позиция</td>
            <td>Действие</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($widgets as $widget)
            <tr>
              <td>{{ $widget->id }}</td>
              <td>{{ $widget->name }}</td>
              <td>{{ $widget->specification }}</td>
              <td>{{ $widget->position }}</td>
              <td>
                <form action="{{ route('update-widget-status', $widget->id) }}" class="form__status" method="POST">
                  @csrf
                  @method('PUT')
                  <select name="status" id="status" class="form-select {{ $widget->status }}">
                    <option value="included" {{ ($widget->status == "included")? 'selected' : '' }}><span class="included">активен</span></option>
                    <option value="turned_off" {{ ($widget->status == "turned_off")? 'selected' : '' }}><span class="turned_off">Не активен</span></option>
                  </select>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div> --}}
  @endsection
