<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack_product extends Model
{
    use HasFactory;
 /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_packProduct';


    protected $fillable = [
        'pack_id',
        'product_id'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id_product', 'product_id');
    }
}
