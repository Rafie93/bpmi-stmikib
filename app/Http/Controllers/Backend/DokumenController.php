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
            'title' => $title,
            'data' => $data
        ]);
    }
}
