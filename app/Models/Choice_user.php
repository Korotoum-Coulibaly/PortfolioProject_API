<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice_user extends Model
{
    use HasFactory;
     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_choice_user';

    protected $fillable = [
        'user_id',
        'quote_numero',
        'pack_id',
        'quantity',
        'total_price',
        'price_with_discount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id',  'id_user');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'id_product', 'product_id');
    }
    public function pack()
    {
        return $this->hasMany(Pack::class, 'id_pack', 'pack_id');
    }
    public function packdepuisquote()
    {
        return $this->hasMany(Pack::class, 'id_pack', 'pack_id');
    }
    public function productdepuisquote()
    {
        return $this->hasMany(Product::class,'id_product' , 'product_id');
    }
}
