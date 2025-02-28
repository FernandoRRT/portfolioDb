<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Person;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request, Person $person)
    {
        $contact = $person->contacts()->create($request->all());
        return response()->json($contact, 201);
    }

    public function update(Request $request, Person $person, $id)
    {
        $contact = $person->contacts()->findOrFail($id);
        $contact->update($request->all());
        return response()->json($contact, 200);
    }

    public function destroy(Person $person, $id)
    {
        $person->contacts()->findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}