<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;

class QuestionController extends Controller
{
    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question_text' => 'required',
            'correct_answer' => 'required',
        ]);

        $question = $quiz->questions()->create($request->all());

        return response()->json($question, 201);
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());

        return response()->json($question);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json(null, 204);
    }
}

