<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Media extends Model
{
    use Notifiable;

    protected $fillable = [
        'type',
        'src',
    ];

    public $timestamps = true;
}

