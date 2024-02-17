@extends("layouts.{$layout}")
  @section('title', 'widgets | главная страница')
  @section('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <h1>WIDGETS | Главная</h1>
    <div class="container">
        <div class="row">
            <div class="col-8">
                {{-- <ul id="widget-list">
                    @for ($n = 0; $n < count($widgets); $n++) 
                        <li class="widget">{{$widgets[$n]->name}}</li>
                    @endfor
                </ul>
                <ul id="position-list">
                    @for ($n = 0; $n < count($widgets); $n++) 
                        <li class="widget">{{$widgets[$n]->position}}</li>
                    @endfor
                </ul> --}}
                <div class="table-wrap">
                  <table class="table">
                    <thead>
                      <tr>
                        {{-- <td>id</td> --}}
                        <td>Название</td>
                        <td>Описание</td>
                        <td>Позиция</td>
                        <td>Действие</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($widgets as $widget)
                        <tr id="widget-list">
                          {{-- <td>{{ $widget->id }}</td> --}}
                          <td class="widget">{{ $widget->name }}</td>
                          <td>{{ $widget->specification }}</td>
                          <td>{{ $widget->position_product }}</td>
                          <td>
                            <form action="{{ route('update-widget-status-product', $widget->id) }}" class="form__status" method="POST">
                              @csrf
                              @method('PUT')
                              
                              <select name="status" id="status" class="form-select {{ $widget->status_product }}">
                                <option value="included" {{ ($widget->status_product == "included")? 'selected' : '' }}><span class="included">активен</span></option>
                                <option value="turned_off" {{ ($widget->status_product == "turned_off")? 'selected' : '' }}><span class="turned_off">Не активен</span></option>
                              </select>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="col-4">
                <div class="row justify-content-center">
                  <div class="module">
                    <div class="header">header/user</div>
                    <div class="header-top-one" data-item="header-top-one">header-top-one</div>
                    <div class="header-top-two" data-item="header-top-two">header-top-two</div>
                    <div class="content">
                      <div class="content__item content-top-one" data-item="content-top-one">
                        content-top-one
                      </div>  
                      <div class="content__item content-top-two" data-item="content-top-two">
                        content-top-two
                      </div>
                      <div class="content__item content-top-three" data-item="content-top-three">
                        content-top-three
                      </div>
                      <div class="content__item content-top-four" data-item="content-top-four">
                        content-top-four
                      </div>
                      <div class="content__item content-main" data-item="content-main">
                        content-main
                      </div>
                      <div class="content__item content-bottom-one" data-item="content-bottom-one">
                        content-bottom-one
                      </div>  
                      <div class="content__item content-bottom-two" data-item-id="content-bottom-two">
                        content-bottom-two
                      </div>
                      <div class="content__item content-bottom-three" data-item-id="content-bottom-three">
                        content-bottom-three
                      </div>
                      <div class="content__item content-bottom-four" data-item-id="content-bottom-four">
                        content-bottom-four
                      </div>
                    </div>
                    <div class="extra">
                      <div class="extra__item extra-top-one" data-item-id="extra-top-one">
                        extra-top-one
                      </div>
                      <div class="extra__item extra-top-two" data-item-id="extra-top-two">
                        extra-top-two
                      </div>
                      <div class="extra__item extra-bottom-one" data-item-id="extra-bottom-one">
                        extra-bottom-one
                      </div>
                      <div class="extra__item extra-bottom-two" data-item-id="extra-bottom-two">
                        extra-bottom-two
                      </div>
                    </div>
                    <div class="footer" data-item-id="1">footer</div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    

    

    
    
    <script>
      $(function() {
          $(".widget, .position").draggable({
              revert: "invalid"
          });

          $("#position-list").droppable({
            //   accept: ".widget",
              drop: function(event, ui) {
                  // выполнение нужных действий при сбросе виджета в позицию
              }
          });

          $("#widget-list").droppable({
            //   accept: ".position",
              drop: function(event, ui) {
                  // выполнение нужных действий при сбросе позиции в виджет
              }
          });
      });
    </script>
    
  @endsection