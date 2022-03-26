<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivationHash extends Model
{
    use HasFactory;

    protected $fillable = [
        'activation_hash',
        'id_user',
    ];
}
