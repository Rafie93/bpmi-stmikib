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
        return view('backend.dokumen.index', [
            'type' => $key,
            'title' => MonevMenu::getById($key),
            'data' => $data
        ]);
    }
}
