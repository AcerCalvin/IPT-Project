<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentModel;

class ParentController extends Controller
{
    public function index()
    {
        return response()->json(ParentModel::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(ParentModel::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(ParentModel::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $parent = ParentModel::findOrFail($id);
        $parent->update($request->all());
        return response()->json($parent, 200);
    }

    public function destroy($id)
    {
        ParentModel::destroy($id);
        return response()->json(null, 204);
    }
}
