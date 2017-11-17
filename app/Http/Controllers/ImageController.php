<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ImageMagic;
use App\Models\Image;


class ImageController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')) {
            $paths = ImageMagic::upload($request);
            if ($paths) {
                $image = Image::create(['path' => $paths]);
                return redirect()->route('view', ['id' => $image->id]);
            }
        }
            return view('pages.index');
    }
    
    public function view($id){
        $image = Image::find($id);
       return view('pages.preview')->with([
           'image'=> $image
       ]);
    }
}
