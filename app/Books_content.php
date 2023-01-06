<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books_content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'books_contents';

    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
}

