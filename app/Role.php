<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $connection = 'pgsql';
    public $guarded = [];
}
