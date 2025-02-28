<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Person;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request, Person $person)
    {
        $education = $person->education()->create($request->all());
        return response()->json($education, 201);
    }

    public function update(Request $request, Person $person, $id)
    {
        $education = $person->education()->findOrFail($id);
        $education->update($request->all());
        return response()->json($education, 200);
    }

    public function destroy(Person $person, $id)
    {
        $person->education()->findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}