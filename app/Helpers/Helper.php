<?php

namespace App\Helpers;
use App\Models\Author;

class Helper {
    function find_co_author($id)
    {
        $find_id = Author::find($id);
        $author_name = $find_id->author_name;
        return $author_name;
    }    
}