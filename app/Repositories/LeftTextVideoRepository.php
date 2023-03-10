<?php

namespace App\Repositories;

use App\Interfaces\LeftTextVideoRepositoryInterface;
use App\Models\LeftTextVideo;

class LeftTextVideoRepository implements LeftTextVideoRepositoryInterface 
{
    public function getAll() 
    {
        return LeftTextVideo::all();
    }

    public function getById($Id) 
    {
        return LeftTextVideo::findOrFail($Id);
    }

    public function delete($Id) 
    {
        LeftTextVideo::destroy($Id);
    }

    public function create(array $Details) 
    {
        return LeftTextVideo::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return RightTextVideo::whereId($Id)->update($newDetails);
    }

}
