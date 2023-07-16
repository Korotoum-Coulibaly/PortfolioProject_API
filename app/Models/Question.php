<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

         /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_question';

    protected $fillable = [
        'libelle',
    ];

    public function question_answer()
    {
        return $this->hasMany(Question_answer::class, 'question_id', 'id_question');
    }
}
