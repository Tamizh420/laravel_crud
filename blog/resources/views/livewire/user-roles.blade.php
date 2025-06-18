<div class="p-4">

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 mb-2">{{ session('message') }}</div>
    @endif
<input type="text"
           wire:model.live="search"
           placeholder="Search by name or email"
           class="border rounded p-2 w-full mb-4"
           wire:keyup="set(search, $event.target.value)"
           />
    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded mb-3">Create User</button>
    <div class="mb-4">
    <label for="perPage" class="mr-2 font-semibold">Results per page:</label>
    <select wire:model.live="perPage" id="perPage" class="border p-1 rounded">
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="8">8</option>
        <option value="10">10</option>
    </select>
</div>

  @if($isOpen)   
        @include('livewire.role-model')
    @endif

    
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Phone</th>
                <th class="p-2">city</th>
                <th class="p-2">Aadhaar Number</th>
                <th class="p-2">Aadhaar Phone</th>
                <th class="p-2">Roles</th>
                 
                <th class="p-2">Actions</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t">
                <td class="p-2">{{ $user->name }}</td>
                <td class="p-2">{{ $user->email }}</td>
                <td class="p-2">{{ $user->phone }}</td>
                <td class="p-2">{{ $user->city }}</td>
                <td class="p-2">{{ $user->adhaar?->aadhaar_number }}</td>
                <td class="p-2">{{ $user->adhaar?->phone_number }}</td>
                 <td>
            @foreach ($user->roles as $role)
                <span class="badge">{{ $role->role }}</span>
            @endforeach
        </td>

                
              
                <td class="p-2">
                    <button wire:click="edit({{ $user->id }})" class="bg-yellow-400 px-2 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="bg-red-500 px-2 py-1 text-white rounded">Delete</button>
                    <a href="{{ route('users.show', $user->id) }}" class="bg-green-500 px-2 py-1 text-white rounded">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     <div class="mt-4">
    {{ $users->links() }}
</div>
</div>