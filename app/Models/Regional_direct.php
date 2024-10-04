<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional_direct extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'acronyme',
        'commune',
        'province',
        'region',
        'entet_dir',
        'entet_reg',
    ];
    
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
    
}
