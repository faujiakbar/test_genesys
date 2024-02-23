<?php

namespace App\Models;

class User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'deleted_at'
    ];

    protected $table="user";
}
