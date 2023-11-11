<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Menu\MonevMenu;
use Illuminate\Http\Request;

class MonevController extends Controller
{
    //
    public function index(Request $request, $key)
    {
        $data = Dokumen::where('menu', $key)->where('type', 2)->get();
        return view('backend.monev.index', [
            'type' => $key,
            'header' => "Monetering dan Evaluasi",
            'title' => MonevMenu::getById($key),
            'data' => $data
        ]);
    }

    public function add(Request $request, $key)
    {
        $title = MonevMenu::getById($key);
        return view('backend.monev.create', [
            'type' => $key,
            'header' => "Monetering dan Evaluasi",
            'title' => $title,
        ]);
    }
    public function edit(Request $request, $key, $id)
    {
        $data = Dokumen::find($id);
        $title = MonevMenu::getById($key);
      
        return view('backend.monev.edit', [
            'type' => $key,
            'header' => "Monetering dan Evaluasi",
            'title' => $title,
            'data' => $data
        ]);
    }

    public function store(Request $request, $key)
    {
        $request->validate([
            'title' => 'required',
            'type_upload' => 'required'
        ]);
        $data = new Dokumen();
        $data->title = $request->title;
        $data->menu = $key;
        $data->type = 2;
        $data->type_upload = $request->type_upload ? $request->type_upload : 1;
        $data->files = $request->type_upload == 1 ? '' : $request->link;
        $data->save();
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move('files/', $fileName);
            $data->files = $fileName;
            $data->save();
        }
        return redirect()->route('backend.monev', ['key' => $key])->with('success', 'Monev berhasil ditambahkan');
    }

    public function delete(Request $request, $key, $id)
    {
        $data = Dokumen::find($id);
        $data->delete();
        return redirect()->route('backend.monev', ['key' => $key])->with('success', 'Monev berhasil dihapus');
    }

    public function update(Request $request, $key, $id)
    {
        $request->validate([
            'title' => 'required',
            'type_upload' => 'required'
        ]);
        $data = Dokumen::find($id);
        $data->title = $request->title;
        $data->type_upload = $request->type_upload ? $request->type_upload : 1;
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move('files/', $fileName);
            $data->files = $fileName;
        } elseif ($request->type_upload == 2) {
            $data->files = $request->link;
        }
        $data->save();

        return redirect()->route('backend.monev', ['key' => $key])->with('success', 'Monev berhasil diubah');
    }
}
