<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6 space-y-4">

    <div>
        <span class="font-semibold text-gray-700">Name:</span>
        <p class="p-2 bg-gray-100 rounded text-gray-800">{{ $user->name }}</p>
    </div>

    <div>
        <span class="font-semibold text-gray-700">Email:</span>
        <p class="p-2 bg-gray-100 rounded text-gray-800">{{ $user->email }}</p>
    </div>

    <div>
        <span class="font-semibold text-gray-700">Phone:</span>
        <p class="p-2 bg-gray-100 rounded text-gray-800">{{ $user->phone }}</p>
    </div>

    <div>
        <span class="font-semibold text-gray-700">City:</span>
        <p class="p-2 bg-gray-100 rounded text-gray-800">{{ $user->city }}</p>
    </div>

    <div>
        <span class="font-semibold text-gray-700">Aadhaar Number:</span>
        <p class="p-2 bg-gray-100 rounded text-gray-800">{{ $user->adhaar?->aadhaar_number }}</p>
    </div>

    <div>
        <span class="font-semibold text-gray-700">Aadhaar Phone:</span>
        <p class="p-2 bg-gray-100 rounded text-gray-800">{{ $user->adhaar?->phone_number }}</p>
    </div>

    <div>
        <span class="font-semibold text-gray-700">Roles:</span>
        <div class="flex flex-wrap gap-2 mt-2">
            @foreach ($user->roles as $role)
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">{{ $role->role }}</span>

                <form action="{{route('delete.role' , $role->id) }}" method="DELETE" onsubmit="return confirm('Are you sure?');">
                              @csrf
                           @method('DELETE')
                       <button type="submit" class="text-red-600 font-bold">✖</button>
                 </form>
                
            @endforeach
          
        </div>
    </div>
    {{-- @foreach ($role as $role )
        <p> {{ $role->role ? 'No roles assigned' : '' }}</p>
    @endforeach --}}
    
</div>
