<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function index (){
        $admins = Admin::all();
        return view('pages.index',compact('admins'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'admin_name' => 'required|min:4',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
            'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->admin_image)){
            $imageName = time().'.'.request()->admin_image->getClientOriginalExtension();
            request()->admin_image->move(public_path('images'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }


        $var = new Admin;
        $var->admin_name = $request->input('admin_name');
        $var->admin_email = $request->input('admin_email');
        $var->admin_password = $request->input('admin_password');
        $var->admin_image = $imageName;

        $var->save();
        return back()->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('pages.editAdmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_name' => 'required|min:4',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
            'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->admin_image)){
            $imageName = time().'.'.request()->admin_image->getClientOriginalExtension();
            request()->admin_image->move(public_path('images'), $imageName);
        }
        else {
            $admin = Admin::find($id);
            $imageName= $admin-> admin_image;
        }

        $admin = Admin::find($id);
        $admin->admin_name =  $request->get('admin_name');
        $admin->admin_email = $request->get('admin_email');
        $admin->admin_password = $request->get('admin_password');
        $admin->admin_image = $imageName;
        $admin->save();

        return redirect('/admin')->with('success', 'Contact updated!');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return back()->with('success', 'Admin deleted!');
    }

}
