<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Menu\AkreditasiMenu;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    //
    public function index(Request $request, $key)
    {
        $data = Dokumen::where('menu', $key)->where('type', 3)->get();
        return view('backend.akreditasi.index', [
            'type' => $key,
            'title' => AkreditasiMenu::getById($key),
            'data' => $data
        ]);
    }
}
