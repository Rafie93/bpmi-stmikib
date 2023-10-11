<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        $data = News::latest()
            ->when($request->category, function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->paginate(10);
        $category = News::select('category')->distinct()->get();

        $populer = News::orderBy('be_read', 'desc')
            ->limit(5)
            ->get();
        return view('landing.news', [
            'data' => $data,
            'category' => $category,
            'populer' => $populer
        ]);
    }
    public function show(Request $request, $id)
    {
        $data = News::find($id);
        return view('landing.news-detail', [
            'data' => $data
        ]);
    }
}
