<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $fillable = [
        'link',
        'token',
        'ip',
        'user_agent',
    ];
}
