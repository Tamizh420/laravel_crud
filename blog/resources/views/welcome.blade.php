
<!DOCTYPE html>
 <html>
    <head>
         @vite('resources/css/app.css')  
@livewireStyles
        
    </head>
    <body class="max-w-5xl mx-auto p-4  bg-gray-100">
        
      @livewire('user-form')
        @livewireScripts
    </body>    
 </html>