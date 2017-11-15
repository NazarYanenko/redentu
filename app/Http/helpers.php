<?php

if(!function_exists('watermarkText')){
    function watermarkText($font)
    {
        $font->file(public_path('fonts/GravitasOne.ttf'));
        $font->size(9);
        $font->color('#ff0000');
        $font->valign('top');
    }
}
