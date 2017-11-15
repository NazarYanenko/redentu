<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ImageMagic;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.index');
    }

    public function upload(Request $request)
    {
        ImageMagic::upload($request);
    }
}
