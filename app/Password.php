<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Password extends Model
{
    
    use Notifiable;

    protected $fillable = [
        'title', 'password',
    ];
}
