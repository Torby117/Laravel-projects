<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Controllers\UserController;
use Illuminate\Http\Controllers\QuizController;
use Illuminate\Http\Controllers\QuestionController;
use Illuminate\Http\Controllers\AttemptController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);
Route::middleware('auth:api')->get('me', [UserController::class, 'me']);

Route::middleware('auth:api')->group(function () {
    Route::post('quizzes', [QuizController::class, 'store']); // Create quiz (Admin only)
    Route::put('quizzes/{quiz}', [QuizController::class, 'update']); // Update quiz (Admin only)
    Route::delete('quizzes/{quiz}', [QuizController::class, 'destroy']); // Delete quiz (Admin only)

    Route::get('quizzes', [QuizController::class, 'index']); // List quizzes (All users)
    Route::get('quizzes/{quiz}', [QuizController::class, 'show']); // View single quiz (All users)

    Route::post('quizzes/{quiz}/attempt', [QuizAttemptController::class, 'submitAttempt']); // Submit attempt (All users)
});

Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::post('quizzes', [QuizController::class, 'store']);
    Route::put('quizzes/{quiz}', [QuizController::class, 'update']);
    Route::delete('quizzes/{quiz}', [QuizController::class, 'destroy']);
});

Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::post('quizzes/{quiz}/questions', [QuestionController::class, 'store']);
    Route::put('questions/{question}', [QuestionController::class, 'update']);
    Route::delete('questions/{question}', [QuestionController::class, 'destroy']);
});
Route::middleware('auth:api')->group(function () {
    Route::post('quizzes/{quiz}/attempt', [AttemptController::class, 'submitAttempt']);
});

