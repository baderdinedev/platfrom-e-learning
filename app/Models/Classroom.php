<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'formation_id',
        'inscription_date',
        'limit_place',
        'created_by',
        'access_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function teacher()
{
    return $this->belongsTo(Teacher::class, 'created_by');
}


    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function inscriptionClassrooms()
    {
        return $this->hasMany(InscriptionClassroom::class);
    }
}
