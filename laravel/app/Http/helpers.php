<?php

function colorObjToString($obj) {
    return '#'.substr("00000000".dechex($obj->red * 0x1000000 + $obj->blue * 0x10000 + $obj->green * 0x100 + $obj->alpha),-8);
}

function stringToColorObj($string, $obj) {
    $red = hexdec(substr($string, 1, 2));
    $blue = hexdec(substr($string, 3, 2));
    $green = hexdec(substr($string, 5, 2));
    $alpha = hexdec(substr($string, 7, 2));

    $obj->setRGB($red, $blue, $green);
    $obj->alpha = $alpha;
}
