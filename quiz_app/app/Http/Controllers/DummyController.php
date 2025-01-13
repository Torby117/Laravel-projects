<?php
namespace App\Http\Controllers;

class DummyController extends Controller
{
    public function test()
    {
        return response()->json(['message' => 'DummyController is working!']);
    }
}
