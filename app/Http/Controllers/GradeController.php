<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        return response()->json(Grade::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(Grade::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Grade::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
        return response()->json($grade, 200);
    }

    public function destroy($id)
    {
        Grade::destroy($id);
        return response()->json(null, 204);
    }
}
