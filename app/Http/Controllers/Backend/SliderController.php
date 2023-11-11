<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.slider.index', [
            'title' => "Slider",
            'data' => \App\Models\Slider::all()
        ]);
    }

    public function add(Request $request)
    {
        return view('backend.slider.create', [
            'title' => "Tambah Slider",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required',
        ]);

        $save = Slider::create($request->all());
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move('image/slide/', $fileName);
            $save->image = $fileName;
            $save->save();
        }

        return redirect()->route('backend.slider')->with('success', 'Slider berhasil ditambahkan');
    }
    public function edit(Request $request, $id)
    {
        $data = Slider::find($id);
        return view('backend.slider.edit', [
            'title' => "Edit Slider",
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $save = Slider::find($id);
        $save->update($request->all());
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move('image/slide/', $fileName);
            $save->image = $fileName;
            $save->save();
        }

        return redirect()->route('backend.slider')->with('success', 'Slider berhasil diubah');
    }

    public function delete(Request $request, $id)
    {
        $data = Slider::find($id);
        $data->delete();
        return redirect()->route('backend.slider')->with('success', 'slider berhasil dihapus');
    }

   

}
