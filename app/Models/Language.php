<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name'];

    public function frameworks()
    {
        return $this->belongsToMany(Framework::class, 'person_language_framework')
                    ->withPivot('person_id');
    }
}