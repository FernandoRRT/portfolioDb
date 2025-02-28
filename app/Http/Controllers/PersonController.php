<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    public function show($id)
    {
        $person = Person::with(['contact', 'frontEndSkills.frameworks'])->findOrFail($id);

        return response()->json([
            'id' => $person->id,
            'name' => $person->name,
            'contact' => $person->contact,
            'frontEndSkills' => $person->frontEndSkills->map(function ($language) use ($person) {
                return [
                    'name' => $language->name,
                    'frameworks' => $language->frameworks->where('pivot.person_id', $person->id)->map(function ($framework) {
                        return ['name' => $framework->name];
                    })
                ];
            })
        ]);
    }
}