<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageViews extends Model
{
    protected $fillable = [
        'url',
        'user_id',
        'ip_address'
    ];
}
