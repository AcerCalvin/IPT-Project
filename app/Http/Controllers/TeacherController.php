<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        return response()->json(Teacher::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Teacher::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return response()->json($teacher, 200);
    }

    public function destroy($id)
    {
        Teacher::destroy($id);
        return response()->json(null, 204);
    }
}
