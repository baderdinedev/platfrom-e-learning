<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    protected $fillable = [
           'title',
           'description',
           'mediaUrl',
           'level_id'
        ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }
}
