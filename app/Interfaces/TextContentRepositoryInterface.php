<?php

namespace App\Interfaces;

interface TextContentRepositoryInterface 
{
    public function getAll();
    public function getById($Id);
    public function delete($Id);
    public function create(array $Details);
    public function update($Id, array $newDetails);
    public function showTextContent($Id);
    // public function getFulfilled();
}