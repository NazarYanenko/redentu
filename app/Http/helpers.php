<?php

if(!function_exists('textOptions')){
    function textOptions($font,$color)
    {
        $font->file(public_path('fonts/GravitasOne.ttf'));
        $font->size(9);
        $font->color($color);
        $font->valign('top');
    }
}

if(!function_exists('getPercent')){
    function getPercent($number,$percent)
    {
        return intval($number/100*$percent);
    }
}

if(!function_exists('wm_setLuminance')){
    function wm_setLuminance($waterMark,$imgLuminance)
    {
        if($imgLuminance){
//          Якщо фон темний то ватермарк світлий
            return $waterMark->brightness(50);
        }else{
//          Якщо фон світлий ватермарк темний
            return $waterMark->brightness(-50);
        }
    }
}

if(!function_exists('textPosition')){
    function textPosition($imageWidth,$string,$percent)
    {
        $length = strlen($string)*4;
        return intval(($imageWidth/100*$percent) - $length);
    }
}

if(!function_exists('getImagesSize')){
    function getImagesSize($image = null)
    {
        $size = [];
        $size['width'] = $image->getSize()->width;
        $size['height'] = $image->getSize()->height;
        return $size;
    }
}

if(!function_exists('textLuminance')){
    function textLuminance($luminance)
    {
        return $luminance ? '#000000':'#ffffff';
    }
}

