<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function index()
    {
        return response()->json(ExamType::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(ExamType::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(ExamType::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $examType = ExamType::findOrFail($id);
        $examType->update($request->all());
        return response()->json($examType, 200);
    }

    public function destroy($id)
    {
        ExamType::destroy($id);
        return response()->json(null, 204);
    }
}
