<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $Products = DB::table('products')
        ->select('products.product_id','products.name','products.image','products.price','products.description','categories.name AS category_name')
        ->join("categories", "products.category_id", "categories.category_id")
        ->get();
        $Categories = Category::all();
        // dd($Products);
        return view('pages.products',compact('Products','Categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:4',
            'price' => 'required',
            'description' => 'required',
            'category'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }


        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->image = $imageName;
        $product->save();
        return back()->with('success', 'Category created successfully.');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
       
        return view('pages.editProduct', compact('product','categories'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:4',
            'price' => 'required',
            'description' => 'required',
            'category'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }


        $product =  Product::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->category_id = $request->get('category');
        $product->image = $imageName;
        $product->save();
        return redirect('/products')->with('success', 'product updated!');
    }


    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();

        return back()->with('success', 'Product deleted!');
    }
}