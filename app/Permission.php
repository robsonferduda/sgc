<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $connection = 'pgsql';
    public $guarded = [];
}
