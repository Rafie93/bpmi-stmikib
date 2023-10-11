<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $slide = Slider::where('status', 1)->get();
        return view('landing.beranda', [
            'slide' => $slide
        ]);
    }
}
