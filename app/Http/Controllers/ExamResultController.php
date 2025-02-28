<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamResult;

class ExamResultController extends Controller
{
    public function index()
    {
        return response()->json(ExamResult::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'student_id' => 'required|exists:students,id',
            'score' => 'required|integer|min:0',
        ]);

        return response()->json(ExamResult::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(ExamResult::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $examResult = ExamResult::findOrFail($id);
        $examResult->update($request->all());
        return response()->json($examResult, 200);
    }

    public function destroy($id)
    {
        ExamResult::destroy($id);
        return response()->json(null, 204);
    }
}
