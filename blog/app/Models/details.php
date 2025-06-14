<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class details extends Model
{
   
   public function prifile(){
         return $this->belongsTo(Profile::class, 'user_id', 'id');
    
    
     
   }
    //
}
