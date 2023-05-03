<?php

namespace App\Repositories\Quiz;

use App\Interfaces\Quiz\QuizQuestionRepositoryInterface;
use App\Models\Quiz\QuizQuestion;

class QuizQuestionRepository implements QuizQuestionRepositoryInterface 
{
    public function getAll()
    {
        return QuizQuestion::orderBy('id', 'DESC')->with('quiz')->paginate(10);
    }

    public function getById($Id) 
    {
        return QuizQuestion::findOrFail($Id);
    }

    public function delete($Id) 
    {
        QuizQuestion::destroy($Id);
    }

    public function create(array $Details) 
    {
        return QuizQuestion::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return QuizQuestion::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
