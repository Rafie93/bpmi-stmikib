<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\AboutLpm;
use App\Models\Menu\AboutMenu;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(Request $request, $key)
    {
        $data = AboutLpm::where('menu', $key)->get();
        return view('landing.about', [
            'title' => AboutMenu::getById($key),
            'data' => $data
        ]);
    }
}
