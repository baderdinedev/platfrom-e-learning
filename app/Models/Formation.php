<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = 'formations';

    protected $fillable = [
        'title',
        'description',
        'place_disponible',
        'attachment',
        'meeting_url',
        'is_hidden',
        'niveau',
    ];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    } 
    public function level()
    {
        return $this->belongsTo(Level::class);
    }   
}
