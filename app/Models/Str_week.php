<?php

namespace App\Models;

use App\Models\Rapport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Str_week extends Model
{
    use HasFactory;
    protected $fillable = [
        'Str1',
        'Str2',
        'Str3',
        'Str4',
        'Str5',
        'Str6',
        'Str7',
        'Str8',
        'Str9',
        'Str10',
        'Week1',
        'Week2',
        'Week3',
        'Week4',
        'Week5',
        'Week6',
        'Week7',
        'Week8',
        'Week9',
        'Week10',
        'Week_conlusion',
    ];
    public function rapport()
    {
        return $this->HasOne(Rapport::class);
    }
}



