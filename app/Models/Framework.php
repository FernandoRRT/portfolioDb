<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'language_id',
        'type',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'person_framework');
    }
}