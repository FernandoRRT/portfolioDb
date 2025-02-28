<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonFramework extends Pivot
{
    protected $table = 'person_framework';

    protected $fillable = [
        'person_id',
        'framework_id',
        'created',
        'updated',
    ];
}