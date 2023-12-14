<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrap">
        <div class="navbar">
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
                        <p>{{ $user-> name }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="button-bar" type="submit"><i class="fa-solid fa-arrow-right-from-bracket active"></i></button>
                    </form>                    
                </div>

            </header>
            <main>
                <div class="content">
                    @yield('content')    
                </div>
            </main>
            <footer>
                footer
            </footer> 
        </div>
           
    </div>

    
    <script src="{{ asset('js/menubar.js') }}"></script>
</body>
</html>