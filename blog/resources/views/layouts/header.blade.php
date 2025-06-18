<nav class="bg-white border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">MyApp</a>
                </div>

                <!-- Nav Links -->
                <div class="hidden sm:-my-px sm:ml-10 sm:flex space-x-4">
                    <a href="{{ route('users.show') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="{{ rutote('crud') }}" class="text-gray-700 hover:text-blue-600 font-medium">Users</a>
                    <a href="" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                </div>
            </div>

            <!-- Right Side -->
           
        </div>
    </div>
</nav>
