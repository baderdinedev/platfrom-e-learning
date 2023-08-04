<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';
    
    protected $fillable = [
        'name',
        'description'
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
    

}
