<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrap">
        <div class="navbar">
            <div class="logo">
                <img src="{{ asset('storage/images/admin/logo.png') }}" class='logo__img' alt="logo"><span class="logo__text text-menu">a<span class="logo__red">drom</span>in</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active"><i class="fa-solid fa-table-columns"></i> <span class="text-menu">Главная</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-cubes"></i> <span class="text-menu">Виджеты</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-comment"></i> <span class="text-menu">Комментарии</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-database"></i> <span class="text-menu">База данных</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-box"></i> <span class="text-menu">Товары</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-pen-ruler"></i> <span class="text-menu">123</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-user-pen"></i> <span class="text-menu">Клиенты</span></a></li>
                </ul>
            </nav>    
        </div>
        <div class="wrap-content">
            <header>
                <button class="button-bar">
                    <i class="fa-solid fa-bars-staggered bar active"></i>
                    <i class="fa-solid fa-arrow-left arrow"></i>
                </button>
                
            </header>
            <main>
                <div class="content">
                    @yield('content')    
                </div>
            </main>
        </div>
    </div>
    

    <footer>
        footer
    </footer>
    <script src="{{ asset('js/menubar.js') }}"></script>
</body>
</html>