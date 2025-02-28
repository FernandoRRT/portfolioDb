<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::with(['contacts', 'languages.frameworks', 'education'])->get();
        return response()->json($people);
    }

    public function show($id)
    {
        $person = Person::with(['contacts', 'languages.frameworks', 'education'])->findOrFail($id);

        return response()->json([
            'id' => $person->id,
            'name' => $person->name,
            'about' => $person->about,
            'contacts' => $person->contacts,
            'languages' => $person->languages->map(function ($language) use ($person) {
                return [
                    'name' => $language->name,
                    'frameworks' => $language->frameworks->where('pivot.person_id', $person->id)->map(function ($framework) {
                        return ['name' => $framework->name, 'type' => $framework->type];
                    })
                ];
            }),
            'education' => $person->education
        ]);
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return response()->json($person, 201);
    }

    public function update(Request $request, $id)
    {
        $person = Person::findOrFail($id);
        $person->update($request->all());
        return response()->json($person, 200);
    }

    public function destroy($id)
    {
        Person::destroy($id);
        return response()->json(null, 204);
    }
}