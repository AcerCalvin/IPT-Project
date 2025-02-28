<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassroomStudent;

class ClassroomStudentController extends Controller
{
    public function index()
    {
        return response()->json(ClassroomStudent::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'student_id' => 'required|exists:students,id',
        ]);

        return response()->json(ClassroomStudent::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(ClassroomStudent::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $classroomStudent = ClassroomStudent::findOrFail($id);
        $classroomStudent->update($request->all());
        return response()->json($classroomStudent, 200);
    }

    public function destroy($id)
    {
        ClassroomStudent::destroy($id);
        return response()->json(null, 204);
    }
}
