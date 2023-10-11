<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Menu\AkreditasiMenu;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    public function index(Request $request, $key)
    {
        $data = Dokumen::where('menu', $key)->where('type', 3)->get();
        return view('landing.akreditasi', [
            'title' => AkreditasiMenu::getById($key),
            'data' => $data
        ]);
    }
}
