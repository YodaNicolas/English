<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
    ];
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
}
