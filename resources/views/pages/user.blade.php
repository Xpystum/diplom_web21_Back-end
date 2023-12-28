  @extends("layouts.{$layout}")
  @section('title', 'users')
  @section('content')
  
    <h1>User</h1>
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <td>id</td>
            <td>Ф.И.О.</td>
            <td>Статус</td>  
            <td>Почта</td>
            <td>Дата создание</td>
            <td><i class="fa-solid fa-pen-to-square"></i> | <i class="fa-solid fa-x"></i></td>

          </tr>
        </thead>
        <tbody>
          @foreach ($dbUsers as $dbUser)
            <tr>
              <td>{{ $dbUser->id }}</td>
              <td>{{ $dbUser->name }}</td>
              <td>
                <form action="{{ route('update-user-status', $dbUser->id) }}" class="form__status" method="POST">
                  @csrf
                  @method('PUT')
                  <select name="status" id="status" class="{{ $dbUser->status }} form-select">
                    <option value="user" {{ ($dbUser->status == 'user')? 'selected' : '' }}><span class="user">user</span></option>
                    <option value="ban" {{ ($dbUser->status == 'ban')? 'selected' : '' }}><span class="ban">ban</span></option>
                    <option value="admin" {{ ($dbUser->status == 'admin')? 'selected' : '' }}><span class="admin">admin</span></option>
                  </select> 
                </form>
              </td>
              <td>{{ $dbUser->email }}</td>
              <td>{{ $dbUser->created_at }}</td>
              <td><button class="change"><i class="fa-solid fa-pen-to-square"></i></button> | <button class="remove"><i class="fa-solid fa-x"></i></button></td>

            </tr>
          @endforeach
        </tbody>
        
      </table>  
    </div>
    <script>
        // Находим все выпадающие списки с классом form-select
        var selects = document.querySelectorAll('.form-select');
    
        // Обрабатываем изменение каждого списка
        selects.forEach(function(select) {
            select.addEventListener('change', function() {
                var status = this.value;
                var userId = this.closest('tr').querySelector('td:first-child').innerText;
    
                // Отправляем запрос на сервер для изменения статуса
                fetch('/user/' + userId + '/update-user-status', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Замените на фактический токен CSRF
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Обновляем класс на выпадающем списке
                        this.className = status + ' form-select';
                    }
                })
                .catch(error => console.log(error));
            });
        });
    </script>
    <script>
        // Находим все формы с классом "form__status"
        var statusForms = document.querySelectorAll('.form__status');
    
        // Обрабатываем отправку каждой формы
        statusForms.forEach(function(form) {
            var statusSelect = form.querySelector('select');
    
            statusSelect.addEventListener('change', function() {
                form.submit();
            });
        });
    </script>
    <script>
        // Находим все кнопки с классом "remove"
        var removeButtons = document.querySelectorAll('.remove');
    
        // Обрабатываем клик каждой кнопки
        removeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var userId = this.closest('tr').querySelector('td:first-child').innerText;
    
                // Отправляем DELETE-запрос на сервер для удаления пользователя
                fetch('/users/' + userId + '/delete', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Замените на фактический токен CSRF
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Удаляем строку с таблицы
                        this.closest('tr').remove();
                    }
                })
                .catch(error => console.log(error));
            });
        });
    </script>
    <script src="{{ asset('js/moment.js') }}"></script>

  @endsection
