<?php
/**
 * Created by PhpStorm.
 * User: nazar
 * Date: 14.11.17
 * Time: 15:56
 */

use \Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as ImageTest;


class ImageMagic
{
    public static function upload(Request $request)
    {
//        $lol = ImageTest::make('public/foo.jpg')->resize(300, 200);
//        $lol->text();
        $files = $request->files->all();
        if (isset($files['image'])) {
            self::genrateImageDir();
            $image = Image::make($files['image']->getPathName());
            $text = $request->input('text');
            $imageWidth = $image->getSize()->width;
            $imageHeight = $image->getSize()->height;
//echo "<pre>";
//var_dump($image->iptc());
//echo "</pre>";die;
//            dd($image->limitColors(255, '#ff9900'));

            if (!$request->input('checkbox')) {
                $image->text($request->get('watermarkText'),$imageWidth/2,30,function ($font){
                    watermarkText($font);
//                    $font->file(public_path('fonts/GravitasOne.ttf'));
//                    $font->size(9);
//                    $font->color('#ff0000');
//                    $font->valign('top');
//                    $font->angle();
                });
//                $image->text('foo', 0, 0, function($font) {
//                    $font->color(array(255, 255, 255, 0.5));
//});
            } elseif (isset($files['image2'])) {
                $waterMark = Image::make($files['image2']->getPathName());
                $image->insert($waterMark->resize(
                    intval($imageHeight / 6),
                    intval($imageWidth / 6)
                )->opacity(70)
                );
            }
//            $image->text($text)->save(self::getUniqueName($files['image']->getPathName()));
            if($request->input('text')){
//                dd($request->input('text'));
                $image->text($request->input('text'),$imageWidth/2,30,function ($font){
                    watermarkText($font);
//                    $font->file(public_path('fonts/GravitasOne.ttf'));
//                    $font->size(14);
//                    $font->color('#ff0000');
//                    $font->align('center');
//                    $font->valign('top');
////                    $font->angle();
                });
            }
//            $image->text($text)->save(self::getUniqueName($files['image']->getPathName()));
            $image->save(self::getUniqueName($files['image']->getPathName()));
            return $request;
        }
        return false;
    }



    protected static function genrateImageDir()
    {
        @mkdir(public_path('images'));
    }

    public static function getUniqueName($name)
    {
        return public_path('images/' . sha1($name . time()) . '.jpeg');
    }
}