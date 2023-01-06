<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyScrap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'daily_scraps';

    protected $fillable = ['title', 'scrab','user_id'];

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    
}
