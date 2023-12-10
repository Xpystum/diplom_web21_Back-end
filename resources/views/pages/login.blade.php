    @extends("layouts.{$layout}")
    
    @section('content')

  
    <style media="screen">
        form::after{
            background-image: url("{{ asset('storage/images/admin/logo.png') }}");
        }
    </style>
    <form>
        <h3>Авторизация</h3>

        <label for="email">Почта</label>
        <input type="text" placeholder="example@mail.com" id="email">
        <label for="email" class="error error_email"></label>

        <label for="password">Пароль</label>
        <input type="password" placeholder="Ваш пароль" id="password">
        <label for="password" class="error error_password"></label>

        <button type="button" onClick='Check()'>Войти</button>
    </form>
    <script>
        function Check(){
            let email = document.querySelector('#email');
            let errorEmail = document.querySelector('.error_email');
            let errorPassword = document.querySelector('.error_password');
            let validation = true;

            errorEmail.innerHTML = '';
            errorPassword.innerHTML = '';


                if(email.value.length == 0){
                    errorEmail.innerHTML = "Ошибка логина";
                    validation = false;
                }
                if(password.value.length == 0){
                    errorPassword.innerHTML = "Ошибка пароля";
                    validation = false;
                }
                if(validation){
                    window.location.href = "{{ route('home') }}";
                }
            } 

    </script>

@endsection