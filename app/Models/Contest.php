<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public function subContests() {
        return $this->hasMany(SubContest::class);
    }
    use HasFactory;
}
