<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Styles  --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-center mt-5">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-center bg-success text-white pr-5 pl-5 pt-3 pb-3 w-100 m-auto" style="text-decoration: none;" >Go Back Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-center bg-success text-white pr-5 pl-5 pt-3 pb-3 w-100 m-auto" style="text-decoration: none;">User-Login</a>
                    @endif
                </div>
            @endif
        </div>
    </body>
</html>
