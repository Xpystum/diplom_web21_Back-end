  @extends("layouts.{$layout}")
  @section('title', 'users')
  @section('content')
  
    <h1>User</h1>

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
              <select name="status" id="status" class="{{ $dbUser->status }}">
                <option value="user" {{ ($dbUser->status == 'user')? 'selected' : '' }}><span class="user">user</span></option>
                <option value="ban" {{ ($dbUser->status == 'ban')? 'selected' : '' }}><span class="ban">ban</span></option>
                <option value="admin" {{ ($dbUser->status == 'admin')? 'selected' : '' }}><span class="admin">admin</span></option>
              </select></td>
            <td>{{ $dbUser->email }}</td>
            <td>{{ $dbUser->created_at }}</td>
            <td><button class="change"><i class="fa-solid fa-pen-to-square"></i></button> | <button class="remove"><i class="fa-solid fa-x"></i></button></td>

          </tr>
        @endforeach
      </tbody>
      
    </table>
    <script src="{{ asset('js/moment.js') }}"></script>

  @endsection
