<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'phone_no',
        'address',
        'state',
        'country',
        'gender'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
