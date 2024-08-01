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
        'create_at',
        'cours_id',
        'schools_id'
    ];


    public function cours()
    {
        return $this->belongsTo(cours::class, 'cours_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'schools_id', 'id');
    }

}

