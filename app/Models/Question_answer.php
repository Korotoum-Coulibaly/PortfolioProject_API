<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_answer extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_questionAnswer';

    protected $fillable = [
        'question_id',
        'answer_id'
    ];

    public function answer()
    {
        return $this->hasMany(Answer::class, 'id_answer', 'answer_id');
    }

}
