<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'format',
        'size',
        // 'create_at',
        'course_id',
        'school_id',
        'grade_id',
        // 'documents_id',
        // 'documents_course_id',
        // 'documents_school_id',
        // 'documents_grade_id',
        'period_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function chronos()
    {
        return $this->belongsToMany(Chrono::class, 'chrono_has_documents', 'documents_id', 'chrono_id');
    }
}
