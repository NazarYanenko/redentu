<?php
/**
 * Created by PhpStorm.
 * User: nazar
 * Date: 14.11.17
 * Time: 15:56
 */

use \Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;



class ImageMagic
{
    public static function upload(Request $request)
    {
    $files=$request->files->all();

        $image = Image::make($_FILES['image']['tmp_name']);
        $waterMark= Image::make($_FILES['image2']['tmp_name']);
        dd($image);
        $image->save(public_path('images'));
        $image->insert($waterMark->resize(100,100))->save('/home/nazar/');



        return $request;

    }

//    public function store()
//    {
//
//    }
}