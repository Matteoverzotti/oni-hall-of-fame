<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContest extends Model
{
    public function contest() {
        return $this->belongsTo(Contest::class);
    }
    
    public function contestants() {
        return $this->hasMany(Contestant::class);
    }
    use HasFactory;
}
