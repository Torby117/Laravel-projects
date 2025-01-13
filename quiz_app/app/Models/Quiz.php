<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Quiz extends Model
{
    protected $fillable = ['title', 'description', 'total_attempts', 'average_score'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }


    public function updateStatistics($score)
{
    $this->increment('total_attempts');
    $this->average_score = (($this->average_score * ($this->total_attempts - 1)) + $score) / $this->total_attempts;
    $this->save();
}

    

    }
