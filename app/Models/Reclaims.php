<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclaims extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'id_rewards',
        'token',
        'status',
        'id_supplier'
        ];


    public function rewards()
    {
        return $this->belongsto('App\Models\Rewards','id_rewards','id');
    }
}
