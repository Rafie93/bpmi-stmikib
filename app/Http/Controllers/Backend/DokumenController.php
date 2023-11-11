<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Menu\DokumenMenu;
use App\Models\Menu\SpmiMenu;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    //
    public function index(Request $request, $key)
    {
        $data = Dokumen::where('menu', $key)->where('type', 1)->get();
        $title = DokumenMenu::getById($key);
        if (!$title) {
            $title = SpmiMenu::getById($key);
        }
        return view('backend.dokumen.index', [
            'type' => $key,
            'header' => "Dokumen Digital",
            'title' => $title,
            'data' => $data
        ]);
    }
    public function add(Request $request, $key)
    {
        $title = DokumenMenu::getById($key);
        if (!$title) {
            $title = SpmiMenu::getById($key);
        }
        return view('backend.dokumen.create', [
            'type' => $key,
            'header' => "Dokumen Digital",
            'title' => $title,
        ]);
    }
    public function edit(Request $request, $key, $id)
    {
        $data = Dokumen::find($id);
        $title = DokumenMenu::getById($key);
        if (!$title) {
            $title = SpmiMenu::getById($key);
        }
        return view('backend.dokumen.edit', [
            'type' => $key,
            'header' => "Dokumen Digital",
            'title' => $title,
            'data' => $data
        ]);
    }

    public function store(Request $request,$key){
        $request->validate([
            'title' => 'required',
            'type_upload' => 'required'
        ]);
        $data = new Dokumen();
        $data->title = $request->title;
        $data->menu = $key;
        $data->type = 1;
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
        return redirect()->route('backend.dokumen', ['key' => $key])->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function delete(Request $request, $key, $id)
    {
        $data = Dokumen::find($id);
        $data->delete();
        return redirect()->route('backend.dokumen', ['key' => $key])->with('success', 'Dokumen berhasil dihapus');
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
        }elseif ($request->type_upload==2){
            $data->files = $request->link;
        }
        $data->save();

        return redirect()->route('backend.dokumen', ['key' => $key])->with('success', 'Dokumen berhasil diubah');
    }
}
