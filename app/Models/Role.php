<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

         /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'libelle',
    ];
    public function role_permission()
    {
        return $this->hasMany(Role_permission::class, 'role_id', 'id_role');
    }
}
