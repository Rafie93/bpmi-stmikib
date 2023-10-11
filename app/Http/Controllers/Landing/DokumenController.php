<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Menu\DokumenMenu;
use App\Models\Menu\SpmiMenu;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index(Request $request, $key)
    {
        $data = Dokumen::where('menu', $key)->where('type', 1)->get();
        $title = DokumenMenu::getById($key);
        if (!$title) {
            $title = SpmiMenu::getById($key);
        }
        return view('landing.dokumen', [
            'title' => $title,
            'data' => $data
        ]);
    }
}
