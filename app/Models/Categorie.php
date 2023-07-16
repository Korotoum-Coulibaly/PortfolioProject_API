<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_categorie';

    protected $fillable = [
        'libelle',
    ];

    public function categorie()
    {
        return $this->hasMany(Sub_categorie::class, 'categorie_id', 'id_categorie');
    }
}
