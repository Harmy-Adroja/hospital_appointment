<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // public function models(): MorphToMany
    // {
    //     return $this->morphedByMany(User::class, 'model', 'model_has_roles');
    // }
}
