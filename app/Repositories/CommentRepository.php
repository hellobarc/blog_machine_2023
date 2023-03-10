<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comments;

class CommentRepository implements CommentRepositoryInterface 
{
    // public function getAll() 
    // {
    //     return Comments::all();
    // }

    public function getById($Id) 
    {
        return Comments::findOrFail($Id);
    }

    // public function delete($Id) 
    // {
    //     Comments::destroy($Id);
    // }

    public function create(array $Details) 
    {
        return Comments::create($Details);
    }

    // public function update($Id, array $newDetails) 
    // {
    //     return Comments::whereId($Id)->update($newDetails);
    // }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
