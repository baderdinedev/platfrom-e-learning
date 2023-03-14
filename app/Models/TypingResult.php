<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypingResult extends Model
{
    use HasFactory;

    protected $table = 'typing_results';

    protected $fillable = [
        'speed',
         'accuracy',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}


public function lesson()
{
    return $this->belongsTo(Lesson::class);
}


}
