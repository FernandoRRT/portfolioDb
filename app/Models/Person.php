<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'created',
        'updated',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'person_language');
    }

    public function frameworks()
    {
        return $this->belongsToMany(Framework::class, 'person_framework');
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }
}