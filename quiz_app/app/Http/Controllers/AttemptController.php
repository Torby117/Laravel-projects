<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attempt;
use App\Models\Quiz;


class AttemptController extends Controller
{
    public function submitAttempt(Request $request, Quiz $quiz)
    {
        $user = auth()->user();
        $correctAnswers = $quiz->questions->pluck('correct_answer', 'id');
        $score = 0;

        foreach ($request->answers as $questionId => $userAnswer) {
            if (isset($correctAnswers[$questionId]) && $correctAnswers[$questionId] == $userAnswer) {
                $score++;
            }
        }

        $percentage = ($score / $quiz->questions->count()) * 100;

        // Save the attempt
        $attempt = Attempt::create([
            'quiz_id' => $quiz->id,
            'user_id' => $user->id,
            'score' => $percentage,
        ]);

        // Update quiz statistics
        $quiz->updateStatistics($percentage);

        return response()->json(['score' => $percentage, 'message' => 'Quiz submitted successfully!']);
    }
}

