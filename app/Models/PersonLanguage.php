<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonLanguage extends Pivot
{
    protected $table = 'person_language';

    protected $fillable = [
        'person_id',
        'language_id',
    ];
}