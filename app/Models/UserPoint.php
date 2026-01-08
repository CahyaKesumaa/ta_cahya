<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'strength',
        'endurance',
        'agility',
        'total_point',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
