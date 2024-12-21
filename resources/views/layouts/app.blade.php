<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Recipe Site')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="{{ route('recipes.index') }}">Главная</a>
        @auth
            <a href="{{ route('recipes.create') }}">Добавить рецепт</a>
            <a href="{{ route('recipes.user') }}">Мои рецепты</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endauth
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
