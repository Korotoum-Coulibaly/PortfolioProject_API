<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_office';

    protected $fillable = [
        'office_name',
        'logo',
        'location',
        'subject_quotation_form',
        'remark_subject_quotation',
    ];
    public static function canInsert()
    {
        return self::count() === 0; // Vérifie s'il y a 0 enregistrement dans la table
    }
}
