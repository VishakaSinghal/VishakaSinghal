<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userfollower extends Model
{
    protected $table = 'userfollowers';
    protected $fillable=['id','user_id','follower_user_id'];
    protected $hidden=[];
    //protected $primaryKey = 'admin_id';
    //public $incrementing = false;
    //public $timestamps = false;
}
