<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_answer extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_userAnswer';

    protected $fillable = [
        'user_id',
        'answer_id',
        'quote_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id',  'id_user');
    }
    public function answer()
    {
        return $this->hasMany(Answer::class, 'id_answer',  'answer_id');
    }

    public function quote()
    {
        return $this->hasMany(Quote::class, 'id_quote', 'quote_id');
    }
}
