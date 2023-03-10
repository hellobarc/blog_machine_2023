<?php

namespace App\Repositories;

use App\Interfaces\RightTextVideoRepositoryInterface;
use App\Models\RightTextVideo;

class RightTextVideoRepository implements RightTextVideoRepositoryInterface 
{
    public function getAll() 
    {
        return RightTextVideo::all();
    }

    public function getById($Id) 
    {
        return RightTextVideo::findOrFail($Id);
    }

    public function delete($Id) 
    {
        RightTextVideo::destroy($Id);
    }

    public function create(array $Details) 
    {
        return RightTextVideo::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return RightTextVideo::whereId($Id)->update($newDetails);
    }

}
