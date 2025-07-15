

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
       @yield('css')
    </head>
    <body>

        <header>
            <div class="header__wrapper">
                <div class="header__logo">
                    <a href="/" class="header__logo__image">Todo</a>
                </div>
            </div>
        </header>
    
        <main>
            @yield('content')
        </main>

    </body>
</html>