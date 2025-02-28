<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    public function index()
    {
        $frameworks = Framework::with('language')->get();
        return response()->json($frameworks);
    }

    public function show($id)
    {
        $framework = Framework::with('language')->findOrFail($id);
        return response()->json($framework);
    }

    public function store(Request $request)
    {
        $framework = Framework::create($request->all());
        return response()->json($framework, 201);
    }

    public function update(Request $request, $id)
    {
        $framework = Framework::findOrFail($id);
        $framework->update($request->all());
        return response()->json($framework, 200);
    }

    public function destroy($id)
    {
        Framework::destroy($id);
        return response()->json(null, 204);
    }
}