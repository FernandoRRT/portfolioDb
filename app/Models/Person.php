<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name'];

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function frontEndSkills()
    {
        return $this->belongsToMany(Language::class, 'person_language_framework')
                    ->withPivot('framework_id')
                    ->with('frameworks');
    }
}