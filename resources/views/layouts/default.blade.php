<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

    <div class="wrap">
        <div class="my-navbar">
            <div class="logo">
                <img src="{{ asset('storage/images/admin/logo.png') }}" class='logo__img' alt="logo"><span class="logo__text text-menu">a<span class="logo__white">drom</span>in</span>
            </div>
            <nav>
                @yield('menu-header')
            </nav>    
        </div>
        <div class="wrap-content">
            <header>
                <button class="button-bar">
                    <i class="fa-solid fa-bars-staggered bar active"></i>
                    <i class="fa-solid fa-arrow-left arrow"></i>
                </button>

                <div class="account">
                    <a href="{{ route('productsInReview') }}" class="bell" >
                        <i class="fa-solid fa-bell @if($productsInReviewCount) fa-beat @endif"></i>@if($productsInReviewCount)<span><p>{{ $productsInReviewCount }}</p></span>@endif
                    </a>
                    
                    <p class="name">{{ $user-> name }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="button-bar" type="submit"><i class="fa-solid fa-arrow-right-from-bracket active"></i></button>
                    </form>                    
                </div>

            </header>
            <main>
                <div class="content container">
                    @yield('content')    
                </div>
            </main>
            <footer>
                footer
            </footer> 
        </div>
           
    </div>

    <script>
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
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
    <script src="{{ asset('js/menubar.js') }}"></script>
    <script>
        function goBack() {
            window.history.go(-1); // Вернуться на предыдущую страницу в истории навигации
            setTimeout(function() {
                location.reload(); // Обновить страницу после возврата
            }, 1000); // Задержка в миллисекундах перед обновлением страницы
        }
    </script>
</body>
</html>