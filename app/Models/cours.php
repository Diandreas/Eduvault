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
        'parent_course_id',
    ];

    public function parentCourse()
    {
        return $this->belongsTo(ParentCourse::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class, 'cours_id', 'id');
    }

    public function schools()
    {
        return $this->belongsToMany(School::class, 'schoollevelscours', 'cours_id', 'schoollevel_id');
    }

}


