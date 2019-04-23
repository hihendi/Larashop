<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['name', 'parent'];

    public function subcategories(){
    	return $this->hasMany('App\Category', 'parent');
    }

    public function root(){
    	return $this->belongsTo('App\Category', 'parent');
    }

    public function product(){
    	return $this->belongsToMany('App\Product');
    }

    public function getRelatedProductsIdAttribute(){
        $result = $this->product->pluck('id')->toArray();

        foreach ($this->subcategories as $subcategory) {
            $result = array_merge($result, $subcategory->related_products_id);
        }
        
        return $result;
    }

    public function scopeNoParent($query){
        return $this->where('parent', null);
    }
}
