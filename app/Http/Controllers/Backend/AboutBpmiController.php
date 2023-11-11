<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutLpm;
use App\Models\Menu\AboutMenu;
use Illuminate\Http\Request;

class AboutBpmiController extends Controller
{
    //
    public function index(Request $request, $key)
    {
        $data = AboutLpm::where('menu', $key)->get();
        return view('backend.about.index', [
            'type' => $key,
            'title' => AboutMenu::getById($key),
            'data' => $data
        ]);
    }

    public function add(Request $request, $key)
    {
        return view('backend.about.create', [
            'type' => $key,
            'title' => AboutMenu::getById($key),
        ]);
    }
    public function store(Request $request, $key)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new AboutLpm();
        $data->menu = $key;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('backend.about', ['key' => $key])->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request, $key, $id)
    {
        $data = AboutLpm::findOrFail($id);
        return view('backend.about.edit', [
            'type' => $key,
            'title' => AboutMenu::getById($key),
            'data' => $data
        ]);
    }

    public function update(Request $request, $key, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = AboutLpm::findOrFail($id);
        $data->menu = $key;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('backend.about', ['key' => $key])->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request, $key, $id)
    {
        $data = AboutLpm::findOrFail($id);
        $data->delete();

        return redirect()->route('backend.about', ['key' => $key])->with('success', 'Data berhasil dihapus');
    }
}
