<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    protected $fillable = ['name', 'description', 'country_id', 'image'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : 'https://via.placeholder.com/300x200.png?text=School+Image';
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'schools_has_grades', 'school_id', 'grade_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
