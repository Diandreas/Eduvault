<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    use HasFactory;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];

    /**
     * Get the parent course.
     */
    public function parent()
    {
        return $this->belongsTo(Cours::class, 'parent_id');
    }

    /**
     * Get the child courses.
     */
    public function children()
    {
        return $this->hasMany(Cours::class, 'parent_id');
    }
}


