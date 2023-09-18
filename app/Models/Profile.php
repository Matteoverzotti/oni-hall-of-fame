<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function contestants() {
        return $this->hasMany(Contestant::class, 'profile_id');
    }
    use HasFactory;
}
