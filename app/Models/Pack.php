<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pack';

    protected $fillable = [
        'libelle',
        'sub_categorie_id',
        'microsoft_price',
        'sale_price',
        'dollar_cost',
    ];
    public function pack_product()
    {
        return $this->hasMany(Pack_product::class, 'pack_id', 'id_pack');
    }
    public function subcategory()
    {
        return $this->hasMany(Sub_categorie::class, 'id_sub_categorie', 'sub_categorie_id');
    }
    public function category()
    {
        return $this->hasMany(Categorie::class, 'id_categorie', 'categorie_id');
    }
}
