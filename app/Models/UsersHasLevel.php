<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersHasLevel extends Model
{
    use HasFactory;

    protected $table = 'users_has_level';

    protected $fillable = ['users_id', 'grade_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
