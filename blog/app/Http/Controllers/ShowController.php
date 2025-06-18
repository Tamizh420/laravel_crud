<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;


class ShowController extends Controller
{
    
    

    public function show(User $user)
    {
        $this->user = $user;
    
        
       return view('user-view', compact('user'));
            
        // ->layout('layouts.app');
      
    }
    
 public function destroy($id)
    {
        
        $this->role = Roles::findOrFail($id);
        $this->role->delete();

       
        session()->flash('message', 'Role Deleted.');
        return redirect()->back()->with('message', 'Role Deleted Successfully.');
         
    }
   
}
