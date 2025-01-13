<?php
use Illuminate\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Controllers\QuizController;
use Illuminate\Http\Controllers\QuestionController;
use Illuminate\Http\Controllers\AttemptController;

Route::get('/', function () {
    return view('welcome');
});

