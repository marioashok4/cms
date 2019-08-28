<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Support\Facades\Storage;
class Post extends Model
{	
	use softDeletes;
    protected $fillable=['title','content','description','image','published_at'];

    //Deletes post image from storage
    public function deleteImage()
    {
    	Storage::delete($this->image);
    }
}
