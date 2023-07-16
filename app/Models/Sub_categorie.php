<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_categorie extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_sub_categorie';

    protected $fillable = [
        'categorie_id',
        'libelle',
    ];


    public function pack()
    {
        return $this->hasMany(Pack::class, 'sub_categorie_id', 'id_sub_categorie');
    }
    public function category()
    {
        return $this->hasMany(Categorie::class, 'id_categorie', 'categorie_id');
    }

}
