<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_level', 'grade_id', 'users_id');
    }

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_has_grade', 'grade_id', 'school_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
