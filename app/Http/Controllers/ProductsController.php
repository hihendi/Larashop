<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use Session;


class ProductsController extends Controller
{


    public function __construct(){
        
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if (Gate::allows('staff-access')) {
                return $next($request);
            }
            abort(403, 'Mohon maaf anda tidak memiliki hak akses');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');

        $products = Product::where('name', 'LIKE', '%'.$q.'%')->latest('created_at')->paginate(5);
        return view('products.index', compact('q', 'products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all()->pluck('name', 'id');
        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:products',
            'model' => 'required',
            'photo' => 'required|mimes:jpeg,png|max:10240',
            'price' => 'required|numeric|min:1'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->model = $request->model;
        $product->price = $request->price;

        if ($request->file('photo')) {
            $image_path = $request->file('photo')->store('image','public');

            $product->photo = $image_path;
        }

        $product->save();

        $product->category()->sync($request->category, false);

        Session::flash('success', $request->get('name').' berhasil ditambahkan');

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all()->pluck('name', 'id');

        return view('products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $request->validate([
            'name'=> 'required|max:100|unique:products,name,'.$products->id,
            'model'=>'required',
            'photo' => 'mimes:jpeg,png|file|max:10240',
            'price'=>'required|numeric|min:1'
        ]);

        $products->name = $request->name;
        $products->model = $request->model;
        $products->price = $request->price;

        if ($request->file('photo')) {
            if ($products->photo && file_exists(storage_path('app/public/'.$products->photo)) ) {
                Storage::delete('public/'.$products->photo);
            }

            $new_image = $request->file('photo')->store('image','public');

            $products->photo = $new_image;
        }

        $products->save();

        $products->category()->sync($request->category);

        Session::flash('success', $request->get('name'). " berhasil diupdate.");

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->category()->detach();

        Storage::delete('public/'.$products->photo);
        $products->delete();

        Session::flash('success', 'Data berhasil dihapus');

        return redirect()->route('products.index');
    }
}
