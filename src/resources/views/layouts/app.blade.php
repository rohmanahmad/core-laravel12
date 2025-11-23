<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <livewire:navbar />
    <main class="container mx-auto py-8">
        @yield('content')
    </main>
    <livewire:footer />
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
