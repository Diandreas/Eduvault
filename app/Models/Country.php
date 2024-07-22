<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property $id
 * @property $name
 * @property $abbr
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Country extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'abbr'];


}
