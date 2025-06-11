<!DOCTYPE html>
<html>
<head>
    <title>Livewire CRUD</title>
     @vite('resources/css/app.css') 
     @livewireStyles
</head>
<body>
    <h1>Hello it's Livewire</h1>
    <div class="max-w-4xl mx-auto p-4">
         @livewire('user-crud')
        
    </div>
    @livewireScripts
</body>
</html>
