<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userfollowing extends Model
{
    protected $table = 'userfollowers';
    protected $fillable=['id','user_id','following_user_id'];
    protected $hidden=[];
}
