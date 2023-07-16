<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_roleUser';

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function role()
    {
        return $this->hasMany(Role::class, 'id_role', 'role_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id',  'id_user');
    }

}
