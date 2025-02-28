<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        return response()->json(Exam::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_type_id' => 'required|exists:exam_types,id',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
        ]);

        return response()->json(Exam::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Exam::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());
        return response()->json($exam, 200);
    }

    public function destroy($id)
    {
        Exam::destroy($id);
        return response()->json(null, 204);
    }
}
