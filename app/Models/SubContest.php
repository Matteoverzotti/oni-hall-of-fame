<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubContest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'date'];

    // Mutators
    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['name_id'] = Str::uuid();
    }

    // Database Relations
    public function contest() {
        return $this->belongsTo(Contest::class);
    }
    
    public function contestants() {
        return $this->hasMany(Contestant::class)->orderBy('place');
    }
}
