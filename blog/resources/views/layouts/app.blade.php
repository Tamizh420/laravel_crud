<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Livewire App' }}</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- or your asset system --> --}}
     @vite('resources/css/app.css') 

    @livewireStyles
</head>
<body class="antialiased bg-gray-100 text-gray-800">
    <head>
        @include('layouts.header')
    </head>
    {{-- {{ $slot }} --}}
   @section('content')
    <section>
        <h1>hello</h1>
    </section>
 @show
    @livewireScripts
</body>
</html>
