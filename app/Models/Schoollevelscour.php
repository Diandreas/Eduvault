<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schoollevelscour
 *
 * @property $id
 * @property $schoollevel_id
 * @property $cours_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cour $cour
 * @property Schoollevel $schoollevel
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schoollevelscour extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['schoollevel_id', 'cours_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cour()
    {
        return $this->belongsTo(\App\Models\cours::class, 'cours_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoollevel()
    {
        return $this->belongsTo(\App\Models\Schoollevel::class, 'schoollevel_id', 'id');
    }
    
}
