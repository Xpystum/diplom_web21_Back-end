
    
@section('table-user')
    <table class="table">
        <thead>
        <tr>
            <td>id</td>
            <td>аватар</td>
            <td>Ф.И.О.</td>
            <td>Статус</td>  
            <td>Почта</td>
            <td>Дата создание</td>
        </tr>
        </thead>
        <tbody>
            @foreach ($dbUsers as $dbUser)
                <tr>
                    <td>{{ $dbUser->id }}</td>
                    <td>{{$dbUser->img }}</td>
                    <td>{{$dbUser->name ?  $dbUser->name  : "---" }}</td>
                    <td>
                    <form action="{{ route('update-user-status', $dbUser->id) }}" class="form__status" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" id="status" class="status-{{ $dbUser->status }} form-select">
                        <option value="user" {{ ($dbUser->status == 'user')? 'selected' : '' }}><span class="user">user</span></option>
                        <option value="ban" {{ ($dbUser->status == 'ban')? 'selected' : '' }}><span class="ban">ban</span></option>
                        <option value="admin" {{ ($dbUser->status == 'admin')? 'selected' : '' }}><span class="admin">admin</span></option>
                        </select> 
                    </form>
                    </td>
                    <td>{{ $dbUser->email }}</td>
                    <td>{{ $dbUser->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
  </table>
@endsection