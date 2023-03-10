<?php

namespace App\Repositories;

use App\Interfaces\ModuleRepositoryInterface;
use App\Models\Module;

class ModuleRepository implements ModuleRepositoryInterface 
{
    public function getAll() 
    {
        return Module::all();
    }

    public function getById($Id) 
    {
        return Module::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Module::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Module::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Module::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
