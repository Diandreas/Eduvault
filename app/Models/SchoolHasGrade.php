<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolHasGrade extends Model
{
    use HasFactory;

    protected $table = 'school_has_grade';

    protected $fillable = ['school_id', 'school_country_id', 'grade_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
