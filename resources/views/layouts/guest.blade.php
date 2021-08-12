<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- PWA Manifest --}}
        <link rel="manifest" href="{{URL::to('_manifest.json')}}">
        
       <!-- Favicon icon -->
       <link rel="shortcut icon" href="{{ URL::asset('TVETXR.ico') }}" type="image/x-icon">
       <title>TVET EXTENDED REALITY</title>
       <title>E-LEARNING</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    </head>

    <body >
        <div class="font-sans text-gray-900 antialiased" >
               @if (isset($slot))
                    {{ $slot }}
                @endif
        </div>
    </body>

    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker
                .register('/_service-worker.js')
                .then(function () {
                console.log('Service worker registered!');
                })
                .catch(function(err) {
                console.log(err);
                });
            }
    </script>

</html>
