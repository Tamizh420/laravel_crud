<!DOCTYPE html>
<html>
<head>
    @extends('layouts.app')
    <title>Livewire CRUD</title>
     @vite('resources/css/app.css') 
     @livewireStyles
</head>
<body>
    @section('content')
        <h1 class="text-2xl font-bold mb-4">User CRUD Operations</h1>
   
    <div class="max-w-4xl mx-auto p-4">
         @livewire('user-crud')
        
    </div>
    @livewireScripts
</body>
</html>
