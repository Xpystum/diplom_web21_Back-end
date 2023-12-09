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
    <header>
        <img src="{{ asset('storage/images/admin/logo.png') }}" alt="logo">
    </header>
    <main>
        <nav>
            <ul>
                <li><a href="#"><i class="fa-solid fa-table-columns"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-cubes"></i></a></li>
                <li><a href="#"><i class="fa-regular fa-comment"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-database"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-box"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-pen-ruler"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-user-pen"></i></a></li>
            </ul>
        </nav>
        <div class="content">
            @yield('content')    
        </div>
        
    </main>
    <footer>
        footer
    </footer>
</body>
</html>