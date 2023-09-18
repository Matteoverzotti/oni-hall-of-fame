<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    public function subContest() {
        return $this->belongsTo(SubContest::class, 'sub_contest_id');
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }
    use HasFactory;
}
