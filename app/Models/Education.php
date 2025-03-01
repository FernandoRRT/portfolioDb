<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'started',
        'finished',
        'course_pt',
        'course_en',
        'degree_en',
        'degree_pt',
        'abbreviation',
        'institution',
        'created',
        'updated',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}