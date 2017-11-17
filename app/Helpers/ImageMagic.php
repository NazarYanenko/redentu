<?php
/**
 * Created by PhpStorm.
 * User: nazar
 * Date: 14.11.17
 * Time: 15:56
 */

use \Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Input;


class ImageMagic
{
    public static function upload(Request $request)
    {
        if (isset($request->bgImage)) {
            $imgLuminance = self::checkluminance($request->bgImage->getPathName());

            $image = Image::make($request->bgImage->getPathName());
            $size = getImagesSize($image);
//                 Тип Ватермарка
            if (!$request->checkbox) {
//                 Watermark Текстовий
                $image->text($request->wmText,
                    textPosition($size['width'], $request->wmText, 50),
                    30,
                    function ($font) use ($request,$imgLuminance) {
                        textOptions($font, textLuminance($imgLuminance));
                });

            } elseif (isset($request->wmImage)){
//                Watermark Картинка
                $waterMark = Image::make($request->wmImage->getPathName());
                $wmLuminance = self::checkluminance($request->wmImage->getPathName());
                if ($imgLuminance == $wmLuminance) {
                    wm_setLuminance($waterMark,$imgLuminance);
                    $image->insert($waterMark->widen(getPercent($size['width'], 20))->opacity(60));
                } else {
                    $image->insert($waterMark->widen(getPercent($size['width'], 20))->opacity(60));
                }
            }

//            Накладання тексту
            if ($request->text) {

                $image->text(
                    $request->text,
                    textPosition($size['width'], $request->text, 50),
                    getPercent($size['height'], 90),
                    function ($font) use ($request) {
                        textOptions($font, $request->color);
                    });
//                dd($request->color);
            }

//          зберігає файл

            $paths = self::getUniqueName($request->bgImage->getPathName());
            $image->save(storage_path('app/public/images/').$paths);

            return $paths;
        }
        return false;
    }

    /**
     * Generate unique name for image
     * @param $name
     * @return string
     */

    public static function getUniqueName($name)
    {
        return  sha1($name) . '.jpeg';
    }

    protected static function checkluminance($filename, $num_samples = 10)
    {
        $img = imagecreatefromjpeg($filename);
        $width = imagesx($img);
        $height = imagesy($img);

        $x_step = intval($width / $num_samples);
        $y_step = intval($height / $num_samples);

        $total_lum = 0;

        $sample_no = 1;

        for ($x = 0; $x < $width; $x += $x_step) {
            for ($y = 0; $y < $height; $y += $y_step) {

                $rgb = imagecolorat($img, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;

                // choose a simple luminance formula from here
                // http://stackoverflow.com/questions/596216/formula-to-determine-brightness-of-rgb-color
                $lum = ($r + $r + $b + $g + $g + $g) / 6;

                $total_lum += $lum;

                // debuggicng code
                //           echo "$sample_no - XY: $x,$y = $r, $g, $b = $lum<br />";
                $sample_no++;
            }
        }

        // work out the average
        $avg_lum = $total_lum / $sample_no;
        if ($avg_lum <= 170) {
//            Darck
            return true;
            } else {
//            Light
                return false;
            }
//return $avg_lum;

    }
}