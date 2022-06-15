<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'conditions',
        'photos',
        'points',
        'user_id'
        ];

    public function users()
    {
        return $this->belongsto('App\Models\User','user_id','id');
    }
}
