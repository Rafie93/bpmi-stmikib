<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Menu\MonevMenu;
use Illuminate\Http\Request;

class MonevController extends Controller
{
    public function index(Request $request, $key)
    {
        $data = Dokumen::where('menu', $key)->where('type', 2)->get();
        return view('landing.dokumen', [
            'title' => MonevMenu::getById($key),
            'data' => $data
        ]);
    }
}
