<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-center">
            {{ $user_id ? 'Edit User' : 'Create User' }}
        </h2>

        <form wire:submit.prevent="store">
            <input type="text" wire:model.defer="name" placeholder="Name"
                   class="w-full p-2 border rounded mb-2" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <input type="email" wire:model.defer="email" placeholder="Email"
                   class="w-full p-2 border rounded mb-2" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <input type="text" wire:model.defer="phone" placeholder="Phone"
                   class="w-full p-2 border rounded mb-2" />
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <input type="text" wire:model.defer="city" placeholder="City"
                   class="w-full p-2 border rounded mb-2" />
            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <input type="text" wire:model.defer="aadhaar_number" value="{{ $aadhaar_number }}" placeholder="Aadhaar Number"
                   class="w-full p-2 border rounded mb-2" />
            @error('aadhaar_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <input type="text" wire:model.defer="phone_number" value="{{ $phone_number }}" placeholder="Phone Number"
                   class="w-full p-2 border rounded mb-4" />
            @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <input type="text" wire:model.defer="role_name" value="{{ $role_name }}" placeholder="your role"
                   class="w-full p-2 border rounded mb-4" />
            @error('role_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="closeModal"
                        class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
                    Cancel
                </button>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
