<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'data',
        'sub_contest_id',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    // Database Relations
    public function subContest() {
        return $this->belongsTo(SubContest::class);
    }
}
