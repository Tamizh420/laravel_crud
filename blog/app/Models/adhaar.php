<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class adhaar extends Model
{
    //
    

    protected $fillable = [
        'user_id',
        'aadhaar_number',
        'phone_number',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
