<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        return response()->json(Classroom::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $classroom = Classroom::create($request->all());
        return response()->json($classroom, 201);
    }

    public function show($id)
    {
        return response()->json(Classroom::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());
        return response()->json($classroom, 200);
    }

    public function destroy($id)
    {
        Classroom::destroy($id);
        return response()->json(null, 204);
    }
}
