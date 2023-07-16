<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

         /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_quote';

    protected $fillable = [
        'user_id',
        'all_price',
        'date_emission',
        'date_expiration',
        'prospect_id',
        'office_id',
        'quote_numero',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id',  'id_user');
    }
    public function prospect()
    {
        return $this->hasMany(Prospect::class, 'id_prospect', 'prospect_id');
    }
    public function office()
    {
        return $this->hasMany(Office::class, 'id_office', 'office_id');
    }
    public function choice()
    {
        return $this->hasMany(Choice_user::class, 'quote_numero', 'quote_numero');
    }
}
