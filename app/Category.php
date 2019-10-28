<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'id_password',
    ];
}
