<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cause;
use Illuminate\Http\Request;

class CauseController extends Controller
{
    public function index(){
        return view('dashboard.dashboardCauses.index');
    }
    public function create(){
        $Status = Cause::all();
        $Categores = Category::all();
        return view('dashboard.dashboardCauses.create', compact('Categores', 'Status'));
    }
    public function store(Request $request){
        $data = array(
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'short_description' => $request->short_description,
            'image' =>$request->image,
            'description' => $request->description,
        );
        if($request->ajax()) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif,svg'
            ]);

        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/upload"), $fileName);

            $data['image'] = $fileName;
        }
//        dd($data);
        $create = Cause::create($data);
        return redirect()->back()->with('success', 'Add Causes complete');


//        request()->validate([
//            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path("/upload"), $fileName);
//            $data['image'] = $fileName;
//        }
//
//        $create = Cause::create($data);
//        return redirect()->back()->with('success', 'Add Causes complete');


    }
}
