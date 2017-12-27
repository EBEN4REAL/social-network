<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendships extends Model
{

    protected $fillable = [
        'requester',
        'user_requested',
        'status'
    ];
}
