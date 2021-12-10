<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script defer src="{{ asset('fontawesome-free-5.15.4-web/js/all.js') }}"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="antialised">
       
        @include('navBar')
        <script>
             $(document).ready(function() {
                window.addEventListener('scroll',function (){
                    $scrolled = window.scrollY;
                    if($scrolled > 150){
                        $('.topNav').addClass('shadow-lg md:bg-opacity-100')
                    }else{
                        $('.topNav').removeClass('shadow-lg md:bg-opacity-100')
                    }
                })
                $('.bars').on('click',function(){
                    $('.menu').toggleClass('hidden flex')
                })
            })
        </script>
    </body>
</html>
