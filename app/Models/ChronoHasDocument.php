<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChronoHasDocument extends Model
{
    use HasFactory;

    protected $table = 'chrono_has_documents';

    protected $fillable = ['chrono_id', 'documents_id', 'documents_course_id', 'documents_school_id', 'documents_grade_id', 'status'];

    public function chrono()
    {
        return $this->belongsTo(Chrono::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'documents_id');
    }
}
