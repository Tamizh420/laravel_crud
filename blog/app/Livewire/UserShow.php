<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Roles;

class UserShow extends Component
{
    public $user;
    public $role;
    

    public function mount(User $user)
    {
        $this->user = $user;
    
        
       
      
    }
    
 public function deleteRole($id)
    {
        
        $this->role = Roles::findOrFail($id);
        $this->role->delete();
       
        session()->flash('message', 'Role Deleted.');
    }
    public function render()
    {
        return view('livewire.user-show', [
            'user' => $this->user,
        ])
        ->layout('layouts.app');
    }
}
