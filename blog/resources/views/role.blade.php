<!DOCTYPE html>
 <html>
    <head>
         @vite('resources/css/app.css')  
@livewireStyles
        <h1>user roles</h1>
    </head>
    <body class="max-w-6xl mx-auto p-4  bg-gray-100">
        
      @livewire('user-roles')
        @livewireScripts
    </body>    
 </html>