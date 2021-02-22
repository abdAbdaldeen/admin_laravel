<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        $categories = Category::all();
        return view('pages.category',compact('categories'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required|min:4',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }


        $var = new Category;
        $var->name = $request->input('name');
        $var->image = $imageName;
        $var->save();
        return back()->with('success', 'Category created successfully.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(Category $category)
    {
        //
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
         $category = Category::find($id);
       
        return view('pages.editCategory', compact('category'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:4',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }


        $category =  Category::find($id);
        $category->name = $request->get('name');
        $category->image = $imageName;
        $category->save();
        return redirect('/category')->with('success', 'category updated!');
    }

    /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return back()->with('success', 'Category deleted!');
    }
}