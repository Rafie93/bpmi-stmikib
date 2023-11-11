<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    public function index(Request $request){
        $data = News::
                when($request->keyword, function ($query) use ($request) {
                    $query->where('title', 'like', "%{$request->keyword}%")
                        ->orWhere('category', 'like', "%{$request->keyword}%");
                })
                ->paginate(5)
                ->withQueryString();

        return view('backend.news.index',[
            'header' => "Berita",
            'title' => "Berita",
            'data' => $data
        ]);
    }

    public function add(Request $request){
        return view('backend.news.create',[
            'title' => "Tambah Berita",
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'file' => 'required',
            'category' => 'required',
        ]);

        $save = News::create($request->all());
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move('image/news/', $fileName);
            $save->image = $fileName;
            $save->save();
        }

        return redirect()->route('backend.news')->with('success', 'Berita berhasil ditambahkan');
    }
    public function edit(Request $request, $id){
        $data = News::find($id);
        return view('backend.news.edit',[
            'title' => "Edit Berita",
            'data' => $data
        ]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);

        $save = News::find($id);
        $save->update($request->all());
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move('image/news/', $fileName);
            $save->image = $fileName;
            $save->save();
        }

        return redirect()->route('backend.news')->with('success', 'Berita berhasil diubah');
    }

    public function delete(Request $request, $id){
        $data = News::find($id);
        $data->delete();
        return redirect()->route('backend.news')->with('success', 'Berita berhasil dihapus');
    }

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move('image/uploads/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('image/uploads/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
