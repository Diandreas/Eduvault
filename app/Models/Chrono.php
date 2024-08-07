<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chrono extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'chrono_has_documents', 'chrono_id', 'documents_id');
    }
}
