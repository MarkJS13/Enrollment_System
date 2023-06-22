<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="" defer > </script>
    <title>Blog Post</title>
</head>
<body>

    <main>
        <header>
            <div class="logo">
                <span class="material-symbols-outlined"> school </span>
            </div>
        </header>

        <div class="welcome-content">
            <div class="text">
                <h1> Alucard State University </h1>
                <h2> Enrollment Management System </h2>
            </div>

            <div class="buttons">
                @if (Route::has('login'))
        <div>
            @auth
            <button> <a href="{{ url('/dashboard') }}">Dashboard</a> </button>
            @else
            <button> <a href="{{ route('login') }}">Log in</a> </button>

                @if (Route::has('register'))
                <button class="register">  <a href="{{ route('register') }}">Register</a> </button>
                @endif
            @endauth
        </div>
        @endif 

        
    </main>

</body>
</html>