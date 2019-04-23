<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Category;
use Session;

class CategoriesController extends Controller
{

    public function __construct()
    {
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

        $categories = Category::where('name', 'LIKE', '%'.$q.'%')->latest('name')->paginate(5);
        return view('categories.index', compact('q', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Category::all()->pluck('name', 'id');
        return view('categories.create', compact('parent'));
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
            'name'=>'required|string|max:191|unique:categories',
            
        ]);

        $categories = new Category;
        $categories->name = $request->name;
        $categories->parent = $request->parent;
        $categories->save();
        Session::flash('success', $request->get('name'). " berhasil ditambahkan");
        return redirect()->route('categories.index');
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
        $categories = Category::findorFail($id);
        $parent = Category::all()->pluck('name', 'id');
        return view('categories.edit', compact('categories', 'parent'));
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
        $categories = Category::findorFail($id);
        $request->validate([
            'name'=>'required|string|max:191|unique:categories,name,'.$categories->id
        ]);

        $categories->name = $request->name;
        $categories->parent = $request->parent;
        $categories->update();

        Session::flash('success', $request->get('name')." berhasil diupdate");
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findorFail($id);

        $categories->delete();

        Session::flash('success', "Data berhasil dihapus");

        return redirect()->route('categories.index');
    }
}
