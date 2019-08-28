<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use 
class Post extends Model
{	
	use softDeletes;
    protected $fillable=['title','content','description','image','published_at'];
}
