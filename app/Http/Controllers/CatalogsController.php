<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class CatalogsController extends Controller
{
    public function index(Request $request)
    {
    	// if ($request->has('cat')) {
    	// 	$cat = $request->get('cat');

    	// 	$category = Category::findOrFail($cat);
    	// 	$products = Product::whereIn('id', $category->related_products_id)->paginate(6);
    	// }
    	// else{

    	// 	$products = Product::latest('created_at')->paginate(6);
    	// }
    	$category = Category::get();
    	$products = Category::related_products_id()->product->pluck('id');
    	dd($products);
    	// $parents = Category::noParent()->get();  ini menggunakan custom acessor
    	$totalproducts = Product::count();
    	$parents = Category::where('parent', null)->get();

    	return view('catalogs.index', compact('products', 'cat', 'totalproducts', 'parents'));
    }

}










