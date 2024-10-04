<?php

namespace App\Models;

use App\Models\Str_week;
use App\Models\Regional_direct;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;
    protected $fillable = [
        'Statut',
        'enseignant_id',
        'regional_direct_id',
        'Povince_id',
        'School',
        'city',
        'date_visite',
        'Level_Class',
        'lesson_nature',
        'lesson',
        'boys',
        'girls',
        'Observation',
        'Lesson_Nature',
        'Lesson_Title',
        'Aim',
        'Description',
        'Ob1',
        'Ob2',
        'Ob3',
        'Ob4',
        'Ob5',
        'Str_week_id',
    ];

    public function enseignant()
    {
        return $this->belongsTo( Enseignant::class);
    }
    public function str_week()
    {
        return $this->belongsTo(Str_week::class);
    }
    public function regional_direct()
    {
        return $this->belongsTo(Regional_direct::class);
    }
    public function campagne()
    {
        return $this->belongsTo(Campagne::class);
    }
}
