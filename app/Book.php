<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'books';

    public function books_content()
    {
        return $this->hasMany(Books_content::class);
    }
}
