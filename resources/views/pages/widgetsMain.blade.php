@extends("layouts.{$layout}")
  @section('title', 'widgets | Главная страница')
  @section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <h1>WIDGETS | Главная</h1>
    <div class="container">
        <div class="row">
            <div class="col-3">
                Виджеты
                {{-- <ul id="widget-list">
                    @for ($n = 0; $n < count($widgets); $n++) 
                        <li class="widget" data-item="null" data-id={{$widgets[$n]->id}}>{{$widgets[$n]->name}}</li>
                    @endfor
                </ul>
                Позиция
                <ul class="position-list">
                    @for ($n = 0; $n < count($widgets); $n++) 
                        <li class="position" data-item="null" >{{$widgets[$n]->position}}</li>
                    @endfor
                </ul> --}}
                  {{-- <table class="table">
                    <thead>
                      <tr>
                        <td>Название</td>
                        <td>Позиция</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($widgets as $widget)
                        @if(true || $widget->position_main == '')
                          <tr>
                            <td title="{{ $widget->specification }}">{{ substr($widget->name, 0, -6)}}</td>
                            <td>{{ $widget->position_main }}</td>
                            <td>
                              <form action="{{ route('update-widget-status-main', $widget->id) }}" class="form__status" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-check form-switch">
                                  <input class="form-check-input"  name="status" type="checkbox" id="flexSwitchCheckChecked"  {{ ($widget->status_main == 'on')? 'checked' : '' }}>
                                </div>
                              </form>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table> --}}
                  <ul id="widget-list" class="widget-list">
                    @foreach ($widgets as $widget)
                      @if($widget->position_main == '')
                        <li  class="widget widget-list__item" title={{ $widget->specification }} data-id={{ $widget->id }}><i class="fa-solid fa-arrows-up-down-left-right" data-id={{ $widget->id }}></i> {{ substr($widget->name, 0, -6)}}</li>
                      @endif
                    @endforeach  
                  </ul>
                  
            </div>
            <div class="col-9">
              <div class="row justify-content-center module-wrap">
                  <div class="module">
                    <div class="header">
                      <div class="header-grid">
                        @foreach(['header-panel-left', 'header-panel-center', 'header-panel-right'] as $position)
                          <div class="{{ $position }} header__item position-list" data-position='{{ $position }}'>
                            <style>
                              .{{$position}}{
                                position: relative;
                                grid-area: {{ $position }};
                              }
                              .{{$position}}::after{
                                content: '{{ $position }}';
                                position: absolute;
                                color: #999;
                                inset: 0;
                                z-index: 0;
                              }
                            </style>
                            @foreach($widgets as $widget) 
                              @if($widget->position_main == $position)
                                <div class="position">
                                  <div class="container h-100 position-wrap page-load">
                                    <div class="row item align-items-center justify-content-center" data-id="{{$widget->id}}">
                                      <div class="col item__text" data-id="{{ $widget->id }}">
                                        {{ substr($widget->name, 0, -6)}}
                                      </div>
                                      <div class="col item__button" data-id="{{ $widget->id }}">
                                        <form action="{{ route('update-widget-status-main', $widget->id) }}" class="form__status" method="POST" data-id="{{ $widget->id }}">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-check form-switch">
                                            <input class="form-check-input"  name="status" type="checkbox" id="flexSwitchCheckChecked"  {{ ($widget->status_main == 'on')? 'checked' : '' }}>
                                          </div>
                                        </form>
                                      </div>
                                    </div>  
                                  </div>
                                </div>
                              @endif
                            @endforeach
                          </div>
                        @endforeach
                      </div>  
                    </div>
                    <div class="hero">
                      @foreach(['hero-top-one','hero-top-two'] as $position)
                      <div class="{{ $position }} hero__item position-list" data-position='{{ $position }}'>
                        <style>
                          .{{$position}}{
                            position: relative;
                            grid-area: '{{$position}}';
                          }
                          .{{$position}}::after{
                            content: '{{ $position }}';
                            position: absolute;
                            color: #999;
                            inset: 0;
                            z-index: -1;
                          }
                        </style>
                        @foreach($widgets as $widget) 
                          @if($widget->position_main == $position)
                            <div class="position">
                              <div class="container h-100 position-wrap page-load">
                                <div class="row item align-items-center justify-content-center" data-id="{{$widget->id}}">
                                  <div class="col item__text" data-id="{{ $widget->id }}" >
                                    {{ substr($widget->name, 0, -6)}}
                                  </div>
                                  <div class="col item__button" data-id="{{ $widget->id }}">
                                    <form action="{{ route('update-widget-status-main', $widget->id) }}" class="form__status" method="POST" data-id="{{ $widget->id }}">
                                      @csrf
                                      @method('PUT')
                                      <div class="form-check form-switch">
                                        <input class="form-check-input"  name="status" type="checkbox" id="flexSwitchCheckChecked"  {{ ($widget->status_main == 'on')? 'checked' : '' }}>
                                      </div>
                                    </form>
                                  </div>
                                </div>  
                              </div>
                            </div>
                          @endif
                        @endforeach
                      </div> 
                      @endforeach 
                    </div>

                    <div class="content">
                        @foreach(['content-top-one', 'content-top-two', 'content-top-three', 'content-top-four', 'content-main', 'content-bottom-one', 'content-bottom-two', 'content-bottom-three', 'content-bottom-four'] as $position)
                          <div class="{{ $position }} content__item position-list" data-position='{{ $position }}'>
                            <style>
                              .{{$position}}{
                                position: relative;
                                grid-area: {{ $position }};
                              }
                              .{{$position}}::after{
                                content: '{{ $position }}';
                                position: absolute;
                                color: #999;
                                inset: 0;
                                z-index: 0;
                              }
                            </style>
                            @foreach($widgets as $widget) 
                              @if($widget->position_main == $position)
                                <div class="position">
                                  <div class="container h-100 position-wrap page-load">
                                    <div class="row item align-items-center justify-content-center" data-id="{{$widget->id}}">
                                      <div class="col item__text" data-id="{{ $widget->id }}">
                                        {{ substr($widget->name, 0, -6)}}
                                      </div>
                                      <div class="col item__button" data-id="{{ $widget->id }}">
                                        <form action="{{ route('update-widget-status-main', $widget->id) }}" class="form__status" method="POST" data-id="{{ $widget->id }}">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-check form-switch">
                                            <input class="form-check-input"  name="status" type="checkbox" id="flexSwitchCheckChecked"  {{ ($widget->status_main == 'on')? 'checked' : '' }}>
                                          </div>
                                        </form>
                                      </div>
                                    </div>  
                                  </div>
                                </div>
                              @endif
                            @endforeach
                          </div>
                        @endforeach  
                    </div>
                    <div class="extra">
                          @foreach(['extra-top-one', 'extra-top-two', 'extra-bottom-one', 'extra-bottom-two'] as $position)
                          <div class="{{ $position }} extra__item position-list" data-position='{{ $position }}'>
                            <style>
                              .{{$position}}{
                                position: relative;
                                grid-area: {{ $position }};
                              }
                              .{{$position}}::after{
                                content: '{{ $position }}';
                                position: absolute;
                                color: #999;
                                inset: 0;
                                z-index: 0;
                              }
                            </style>
                            @foreach($widgets as $widget) 
                              @if($widget->position_main == $position)
                                <div class="position">
                                  <div class="container h-100 position-wrap page-load">
                                    <div class="row item align-items-center justify-content-center" data-id="{{$widget->id}}">
                                      <div class="col item__text" data-id="{{ $widget->id }}">
                                        {{ substr($widget->name, 0, -6)}}
                                      </div>
                                      <div class="col item__button" data-id="{{ $widget->id }}">
                                        <form action="{{ route('update-widget-status-main', $widget->id) }}" class="form__status" method="POST" data-id="{{ $widget->id }}">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-check form-switch">
                                            <input class="form-check-input"  name="status" type="checkbox" id="flexSwitchCheckChecked"  {{ ($widget->status_main == 'on')? 'checked' : '' }}>
                                          </div>
                                        </form>
                                      </div>
                                    </div>  
                                  </div>
                                </div>
                              @endif
                            @endforeach
                          </div>
                          @endforeach
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
            // $(".widget").draggable({
              revert: "invalid"
          });

          $(".position-list").droppable({
              accept: ".widget",
              drop: function(event, ui) {
              let widgetPosition = event.target.getAttribute('data-position');
              let widgetId = event.originalEvent.target.getAttribute('data-id');

              console.log('id:',widgetId);
              console.log('position:',widgetPosition);

              
              // AJAX-запрос
              $.ajax({
                  type: 'GET',
                  url: `${widgetId}/save-widget-position-main`,
                  data: {
                      id: widgetId,
                      position: widgetPosition,
                  },
                  success: function(response) {
                      console.log('success');
                      location.reload();
                  },
                  error: function(xhr) {
                    console.log('id:',widgetId);
                    console.log('position:',widgetPosition);
                    console.log(xhr.responseText);
                  }
              });
          }
          });

          $("#widget-list").droppable({
              accept: ".position",
              drop: function(event, ui) {
                console.log(event);
                let widgetId = event.originalEvent.target.getAttribute('data-id');
                console.log(event.originalEvent.target.getAttribute('data-id'));
                  // выполнение нужных действий при сбросе позиции в виджет
              $.ajax({
                  type: 'GET',
                  url: `${widgetId}/save-widget-position-main`,
                  data: {
                      id: widgetId,
                      position: null,
                  },
                  success: function(response) {
                      console.log('success');
                      location.reload();
                  },
                  error: function(xhr) {
                      console.log(xhr.responseText);
                  }
              });
              }
          });
      });
      // чтоб transition не срабатывал раньше времени
      $(document).ready(() => {
        setTimeout(() => $(".page-load").removeClass("page-load"), 10);
      });
    </script>
    
  @endsection