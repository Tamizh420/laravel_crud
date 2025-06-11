<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-1/3">
        <h2 class="text-lg font-bold mb-4">{{ $user_id ? 'Edit User' : 'Create User' }}</h2>

        <form wire:submit.prevent="store">
            <input type="text" wire:model="name" placeholder="Name" class="w-full p-2 border mb-2">
            <input type="email" wire:model="email" placeholder="Email" class="w-full p-2 border mb-2">
            <input type="text" wire:model="phone" placeholder="Phone" class="w-full p-2 border mb-2">
            <input type="text" wire:model="city" placeholder="City" class="w-full p-2 border mb-4">

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
