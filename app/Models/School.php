<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $country_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Country $country
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class School extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'country_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id', 'id');
    }
    
}
