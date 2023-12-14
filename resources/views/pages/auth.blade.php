    @extends("layouts.{$layout}")
    
    @section('content')

  
    <style media="screen">
        form::after{
            background-image: url("{{ asset('storage/images/admin/logo.png') }}");
        }
    </style>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h3>Авторизация</h3>
        <div>
            <div class="input_wrap">
                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Почта" required autofocus>    
            </div>

            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    
        <div>
            <div class="input_wrap">
                <label for="password"><i class="fa-solid fa-lock"></i></label>
                <input id="password" type="password" name="password" required  placeholder="Пароль" autocomplete="current-password">    
            </div>
            
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    
        <button type="submit">Войти</button>
    </form>
    <script>

        function Check(){
            //  
            let email = document.querySelector('#email');
            let password = document.querySelector('#password');
            let validation = true;
            


                if(validation){
                    let formData = new FormData();
                    formData.append('email', email.value);
                    formData.append('password', password.value);

                    // console.log('40. \n логин: '+email.value +" \n пароль: "+ password.value);

                    for (let pair of formData.entries()) {
                        console.log('44. \n'+pair[0]+': '+pair[1]);
                    }
                    

                    fetch("{{ route('checkUser') }}", {
                        method: "POST",
                        body: JSON.stringify(formData)
                    })

                    .then((response) => {return response.json()})
                    .then((data) => {
                        console.log("53. ");
                        console.log(data);
                        if(data.exists){
                            // Пользователь существует, перенаправление на домашнюю страницу (home)
                            window.location.href = "{{ route('home') }}";
                        } else {
                            // Пользователь не существует, перенаправление назад (обратно) 

                            window.location.href = "{{ route('auth') }}";
                        }
                    })
                    .catch(error => console.log(error));
                }
            }
    </script>

@endsection