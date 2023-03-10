<?php

namespace App\Repositories;

use App\Interfaces\RatingRepositoryInterface;
use App\Models\Rating;

class RatingRepository implements RatingRepositoryInterface 
{
    // public function getAll() 
    // {
    //     return Rating::all();
    // }

    public function getById($Id) 
    {
        return Rating::findOrFail($Id);
    }

    // public function delete($Id) 
    // {
    //     Rating::destroy($Id);
    // }

    public function create(array $Details) 
    {
        return Rating::create($Details);
    }

    // public function update($Id, array $newDetails) 
    // {
    //     return Rating::whereId($Id)->update($newDetails);
    // }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
