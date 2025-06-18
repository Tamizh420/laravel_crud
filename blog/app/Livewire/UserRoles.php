<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\adhaar;
use Livewire\WithPagination;
use App\Models\Roles;

class UserRoles extends Component
{
    use WithPagination;

    public $name, $email, $phone, $user_id, $city, $role_name;
    public $aadhaar_number, $phone_number;
    public $isOpen = false;
    public $role = [];
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
        $this->role_name = '';
    }

    public function store()
    {
        $this->validate([
            'name'           => 'required',
            'email'          => 'required|email|unique:users,email,' . $this->user_id,
            'phone'          => 'required',
            'city'           => 'required',
            'aadhaar_number' => 'required|digits:12|unique:adhaars,aadhaar_number,' . $this->user_id . ',user_id',
            'phone_number'   => 'required|digits:10',
            'role_name'      => 'nullable|string|max:255',
        ]);

        $user = User::updateOrCreate(
            ['id' => $this->user_id],
            [
                'name'     => $this->name,
                'email'    => $this->email,
                'phone'    => $this->phone,
                'city'     => $this->city,
                'password' => bcrypt('secret'),
            ]
        );

        if ($user->adhaar()) {
            $user->adhaar()->update([
                'aadhaar_number' => $this->aadhaar_number,
                'phone_number'   => $this->phone_number,
            ]);
        } else {
            $user->adhaar()->create([
                'aadhaar_number' => $this->aadhaar_number,
                'phone_number'   => $this->phone_number,
            ]);
        }

        if ($this->role_name) {
            $user->roles()->create([
                'role' => $this->role_name,
            ]);
        } else {
            $user->roles()->update([
                'role' => $this->role_name,
            ]);
        }

        session()->flash('message', $this->user_id ? 'User Updated.' : 'User Created.');

        $this->closeModal();
        $this->resetInputFields();
    }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     $aadhaar=adhaar::findOrFail($id);
    // //  dd($aadhaar);
    //     $this->user_id = $user->id;
    //     $this->name = $user->name;
    //     $this->email = $user->email;
    //     $this->phone = $user->phone;
    //     $this->city = $user->city;


    //     if ($user->adhaar()) {
    //         $this->aadhaar_number = $user->adhaar()->aadhaar_number ?? '';
    //         $this->phone_number = $user->adhaar()->phone_number ?? '';
           
    //     } else {
    //         $this->aadhaar_number = '';
    //         $this->phone_number = '';
    //     }

    //     $this->roles = $user->roles()->pluck('role')->toArray();
    //     $this->role_name = '';

    //     $this->openModal();
    // }

    public function edit($id)
{
    $user = User::findOrFail($id);

    $this->user_id = $user->id;
    $this->name = $user->name;
    $this->email = $user->email;
    $this->phone = $user->phone;
    $this->city = $user->city;

    $aadhaar = $user->adhaar; // one-to-one relationship

    if ($aadhaar) {
        $this->aadhaar_number = $aadhaar->aadhaar_number ?? '';
        $this->phone_number = $aadhaar->phone_number ?? '';
    } else {
        $this->aadhaar_number = '';
        $this->phone_number = '';
    }
    $roles = $user->roles; // one-to-many relationship
    $this->roles = $user->roles()->pluck('role')->toArray();
    $this->role_name = '';

    $this->openModal();
}


    public function delete($id)
    {
        $user = User::findOrFail($id);

        if ($user->aadhaar) {
            $user->aadhaar->delete();
        }

        $user->delete();

        session()->flash('message', 'User Deleted.');
    }
    public function deleteRole($id)
    {
        $role = Roles::findOrFail($id);
        $role->delete();

        session()->flash('message', 'Role Deleted.');
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

        $users->load('roles');

        return view('livewire.user-roles', ['users' => $users]);
    }
}
