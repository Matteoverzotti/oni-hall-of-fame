<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'date',
        'international',
    ];

    public function setNameAttribute($value): void {
        $this->attributes['name'] = $value;
        $this->attributes['name_id'] = Str::slug($value);
    }

    public function subContests() {
        return $this->hasMany(SubContest::class, 'contest_id');
    }
}
