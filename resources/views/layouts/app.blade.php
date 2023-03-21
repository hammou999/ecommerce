<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <title>لوحة التحكم</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
        @yield('stylesheet')


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            @include('layouts.navigation')
            <div class="cont">
                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="header">
                        @yield('header')
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    @yield('content')
                </main>
            </div>

        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/navigation.js') }}"></script>
    </body>
</html>
