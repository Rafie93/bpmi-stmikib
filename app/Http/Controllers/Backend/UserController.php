<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('backend.user.index',compact('data'));
    }
    public function add()
    {
        return view('backend.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $request->merge([
            'password' => bcrypt($request->password)
        ]);
        User::create($request->all());
        return redirect()->route('backend.user')->with('success', 'User berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $data = User::find($id);
        $data->update($request->all());
        if ($request->password_new) {
           $data->update([
            'password' => bcrypt($request->password_new)
           ]);
        }
        return redirect()->route('backend.user')->with('success', 'User berhasil diupdate');
    }
    public function edit(Request $request, $id) {
        $data = User::find($id);
        return view('backend.user.edit',[
            'data' => $data
        ]);
    }
    public function delete(Request $request, $id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('backend.user')->with('success', 'User berhasil dihapus');
    }
}
