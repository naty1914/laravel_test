<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{
    protected $fillable = ['name', 'skill', 'bio','dojos_id'];
    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;
    public function dojo() {
        return $this->belongsTo(Dojos::class,'dojos_id');
    }
    
}
