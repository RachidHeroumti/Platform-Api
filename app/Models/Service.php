<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Service extends Model
{
    //

    use  Notifiable;

    protected  $fillable=[
        'title',
        'price',
        'description' ,
        'examples',
        'duration',
        'type',
        'image',
        'user_id'
    ];
}
