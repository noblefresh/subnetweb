<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script  src="{{ asset('fontawesome-free-5.15.4-web/js/all.js') }}"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        {{-- Sweet Alert Link --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <div class="ml-72">
                <main class="">
                    <div class="pt-20">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>

    {{-- Sweet Alert Code --}}
    @if (session('success'))
        <script>
            swal({
                title: "Bravos!",
                text: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif
    {{-- End --}}
</html>
