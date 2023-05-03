<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface 
{
    public function getAll() 
    {
        return Comment::orderBy('id', 'DESC')->with('user', 'article')->paginate(10);
    }

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
