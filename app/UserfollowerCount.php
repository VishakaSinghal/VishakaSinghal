<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserfollowerCount extends Model
{
    protected $table = 'userfollowers';
    protected $fillable=['id','user_id','follower_count','following_count'];
    protected $hidden=[];
}
