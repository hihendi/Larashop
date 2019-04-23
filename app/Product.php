<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// protected $table = 'products';
    protected $fillable = ['name','photo','model','price'];

    public function category(){
    	return $this->belongsToMany('App\Category');
    }

    public function getPhotoPathAttribute()
    {
    	if ($this->photo !== '') {
    		return url('storage/'.$this->photo);
    	}
    	else{
    		return 'https://via.placeholder.com/150';
    	}
    }
}
