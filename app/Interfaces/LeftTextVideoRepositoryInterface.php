<?php

namespace App\Interfaces;

interface LeftTextVideoRepositoryInterface 
{
    public function getAll($article_content_id);
    public function getById($Id);
    public function delete($Id);
    public function create(array $Details);
    public function update($Id, array $newDetails);
}