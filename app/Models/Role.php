<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'code',

        // permissions
        'all',
        'view_studies',
        'manage_studies',
        'manage_users',
        'manage_facilities',
    ];

    protected $casts = [
        'all' => 'boolean',
        'view_studies' => 'boolean',
        'manage_studies' => 'boolean',
        'manage_users' => 'boolean',
        'manage_facilities' => 'boolean',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasPermission($permission)
    {
        return $this->$permission;
    }
}
