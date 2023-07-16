<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rolePermission';

    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id',  'id_permission');
    }
    public function role()
    {
        return $this->hasMany(Role::class, 'id_role', 'role_id');
    }
}
