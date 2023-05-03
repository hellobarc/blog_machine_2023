<?php

namespace App\Interfaces;

interface ImageContentRepositoryInterface 
{
    public function getAll($article_content_id);
    public function getById($Id);
    public function delete($Id);
    public function create(array $Details);
    public function update($Id, array $newDetails);
    public function showImageContent($Id);
    // public function getFulfilled();
}