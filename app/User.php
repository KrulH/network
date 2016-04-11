<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable =
        [
            'first_name',
            'email',
            'password',
        ];
}
