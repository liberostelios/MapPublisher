<?php

function colorObjToString($obj) {
    return 'rgba('.$obj->red.','.$obj->green.','.$obj->blue.','.($obj->alpha / 255).')';
}

function stringToColorObj($string, $obj) {
  if (substr($string, 0, 1) == "#")
  {
    $red = hexdec(substr($string, 1, 2));
    $green = hexdec(substr($string, 3, 2));
    $blue = hexdec(substr($string, 5, 2));
    if (strlen($string) == 9) {
      $alpha = hexdec(substr($string, 7, 2));
    } else {
      $alpha = 255;
    }
  } else {
    $string = str_replace('rgba(', '', $string);
    $string = str_replace(')', '', $string);

    $colors = explode(',', $string);

    $red = $colors[0];
    $green = $colors[1];
    $blue = $colors[2];
    $alpha = $colors[3] * 255;
  }

  $obj->setRGB($red, $green, $blue);
  $obj->alpha = $alpha;
}
