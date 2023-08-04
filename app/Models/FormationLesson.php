<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationLesson extends Model
{
    use HasFactory;

    protected $table = 'formation_lesson';

    protected $fillable = [
        'formation_id',
        'lesson_id',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
