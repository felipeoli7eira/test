<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @hasSection ('title')
                @yield('title')
            @else
                Laravel
            @endif
        </title>

        <link rel="stylesheet" href="{{ asset('mdb-ui-kit/css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @hasSection ('css')
            @yield('css')
        @endif
    </head>
    <body>
        <main id="app">

            @hasSection ('content')
                @yield('content')
            @endif

        </main>

        <script src="{{ asset('mdb-ui-kit/js/mdb.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        @hasSection ('js')
            @yield('js')
        @endif
    </body>
</html>
