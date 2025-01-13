<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // Get all quizzes
    public function index()
    {
        return response()->json(Quiz::all());
    }

    // Get a specific quiz
    public function show(Quiz $quiz)
    {
        return response()->json($quiz->load('questions'));
    }

    // Create a new quiz (Admin only)
    public function store(Request $request)
    {
        $this->authorize('admin'); // Ensure only admins can create quizzes

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $quiz = Quiz::create($request->all());

        return response()->json($quiz, 201);
    }

    // Update a quiz (Admin only)
    public function update(Request $request, Quiz $quiz)
    {
        $this->authorize('admin');

        $quiz->update($request->all());

        return response()->json($quiz);
    }

    // Delete a quiz (Admin only)
    public function destroy(Quiz $quiz)
    {
        $this->authorize('admin');

        $quiz->delete();

        return response()->json(null, 204);
    }
}

