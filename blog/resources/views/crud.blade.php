<!DOCTYPE html>
<html>
<head>
    <title>Livewire CRUD</title>
     @vite('resources/css/app.css') 
     @livewireStyles
</head>
<body>
   
    <div class="max-w-4xl mx-auto p-4">
         @livewire('user-crud')
        
    </div>
    @livewireScripts
</body>
</html>
