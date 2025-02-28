<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        return response()->json(Attendance::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'status' => 'required|in:Present,Absent,Late,Excused',
        ]);

        return response()->json(Attendance::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Attendance::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());
        return response()->json($attendance, 200);
    }

    public function destroy($id)
    {
        Attendance::destroy($id);
        return response()->json(null, 204);
    }
}
