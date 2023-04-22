<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $Categores = Category::simplePaginate(10);
        return view('dashboard.dashboardCategories.index', compact('Categores'));
    }
    public function create(){
        return view('dashboard.dashboardCategories.create');
    }
    public function store(Request $request){
        $data = array(

            'title' => $request->title,
            'slug' => $request->slug,
            'color' => $request->color,
        );
//        dd($data);
        $create = Category::create($data);
        return redirect()->back()->with('success', 'Add product complete');
    }
    public function edit($slug){
        $Category = Category::where('slug', '=', $slug)->firstOrFail();
        return view('dashboard.dashboardCategories.edit', compact('Category'));
    }
    public function update(Request $request, $slug){
//        $request->Category([
//
//            'title' => 'required',
//            'slug' => 'required',
//
//        ]);
        $Category = Category::where('slug', '=', $slug)->firstOrFail();

        $Category->title  = $request->input('title');
        $Category->slug   = $request->input('slug');
        $Category->color  = $request->input('color');
        $Category->save();
        return redirect()->route('category.index')->with('success', 'Update Category Success');
    }
    public function destroy($id)
    {
        // Category Delete
        $Category = Category::find($id);
        $Category->delete();
        return response()->json(['success' => "Category delete success!"]);

    }

}
