<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

         /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_prospect';

    protected $fillable = [
        'name_prospect',
        'firstName_prospect',
        'sexe',
        'allied_enterprise',
        'email',
    ];
}
