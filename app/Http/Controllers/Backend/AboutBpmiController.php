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
}
