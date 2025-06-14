<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\adhaar;
use Livewire\WithPagination;
class UserForm extends Component
{
      use WithPagination;

    public $name, $email, $phone, $user_id, $city;
    public $aadhaar_number, $phone_number;
    public $isOpen = false;
    public int $perPage = 5;
    public string $search = '';
    protected $updatesQueryString = ['search', 'perPage'];

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->user_id = '';
        $this->city = '';
        $this->aadhaar_number = '';
        $this->phone_number = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'phone' => 'required',
            'city' => 'required',
            'aadhaar_number' => 'required|digits:12|unique:adhaars,aadhaar_number,' . $this->user_id . ',user_id',
            'phone_number' => 'required|digits:10',
        ]);

        // First create or update the user
        $user = User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'password' => bcrypt('secret'), // use bcrypt instead of plain string
        ]);

     
if ($user->aadhaar) {
    $user->aadhaar->update([
        'aadhaar_number' => $this->aadhaar_number,
        'phone_number' => $this->phone_number,
    ]);
} else {
    $user->adhaar()->create([
        'aadhaar_number' => $this->aadhaar_number,
        'phone_number' => $this->phone_number,
    ]);
}
        // Then create or update the Aadhaar using the user's ID
       

        session()->flash('message', $this->user_id ? 'User Updated.' : 'User Created.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->city = $user->city;

        // Ensure correct relation name: aadhaar()
        if ($user->aadhaar) {
            $this->aadhaar_number = $user->aadhaar->aadhaar_number;
            $this->phone_number = $user->aadhaar->phone_number;
        } else {
            $this->aadhaar_number = '';
            $this->phone_number = '';
        }

        $this->openModal();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Delete Aadhaar first if exists
        if ($user->aadhaar) {
            $user->aadhaar->delete();
        }

        $user->delete();

        session()->flash('message', 'User Deleted.');
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('city', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.user-form', ['users' => $users]);
    }
}