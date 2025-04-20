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

     /**
     * Get the user that owns the service.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
