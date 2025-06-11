<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserCrud extends Component
{
    public $users, $name, $email, $phone, $user_id,$city;
    public $isOpen = 0;

   

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal() { $this->isOpen = true; }
    public function closeModal() { $this->isOpen = false; }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->user_id = '';
    }

    public function store()
    {
        $this->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'phone' => 'required',
            'city' => 'required',
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name'  => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'password'=>'secret'
        ]);

        session()->flash('message', $this->user_id ? 'User Updated.' : 'User Created.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->city= $user->city;

        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted.');
    }
     public function render()
    {
        $this->users = User::all();
        return view('livewire.user-crud');
    }
}