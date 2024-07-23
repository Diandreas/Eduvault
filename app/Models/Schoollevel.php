<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schoollevel
 *
 * @property $id
 * @property $name
 * @property $Description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schoollevel extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'Description'];


}
