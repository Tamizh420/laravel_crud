<div class="p-4">
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 mb-2">{{ session('message') }}</div>
    @endif

    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded mb-3">Create User</button>

  @if($isOpen)   
        @include('livewire.user-modal')
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Phone</th>
                <th class="p-2">city</th>
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
                <td class="p-2">
                    <button wire:click="edit({{ $user->id }})" class="bg-yellow-400 px-2 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="bg-red-500 px-2 py-1 text-white rounded">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
