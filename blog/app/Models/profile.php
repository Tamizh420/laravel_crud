<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
  public function user()
{
    return $this->hasOne(details::class);
}
}
