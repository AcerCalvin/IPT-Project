<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function greet()
    {
        return response()->json(['message' => 'Test Hello!']);
    }
}
