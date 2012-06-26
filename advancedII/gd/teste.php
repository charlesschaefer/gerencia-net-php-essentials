<?php // advancedII/graficos/teste.php

if (!function_exists('imagecreate')) die('Instale a GD!');
// cria uma imagem de 600x400px
$img = imagecreate(600, 400);

$black = imagecolorallocate($img, 0, 0, 0);
$red   = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$blue  = imagecolorallocate($img, 0, 0, 255);

// imagefilledrectangle($img, $sp, $sy, $ep, $ey, $cor);
imagefilledrectangle($img, 30, 20, 130, 120, $red);

// imagefilledarc($img, $cx, $cy, $w, $h, $sp, $ep, $cor, $opt);
imagefilledarc($img, 300, 200, 50, 50, 0, 180, $green, IMG_ARC_NOFILL|IMG_ARC_EDGED);

// imagefilledellipse($img, $cx, $cy, $w, $h, $cor);
imagefilledellipse($img, 400, 300, 70, 20, $blue);

// imagefilledpolygon($img, $arr_points, $qtd_pts, $cor);
$arr_points = array(
    40, 10, // p1
    50, 30, // p2
    30, 30 // p3
);
imagefilledpolygon($img, $arr_points, 3, $blue);

// imagestring($img, $font, $x, $y, $str, $cor);
imagestring($img, 4, 300, 200, "Um belo de um Exemplo", $red);

// imagettftext($img, $size, $angle, $x, $y, $cor, $font_path, $text);
imagettftext($img, 18, 0, 300, 250, $green, __DIR__ . '/exemplos/gd/calligra.ttf', "Um outro belo Exemplo");




header('Content-type: image/png');
imagepng($img);

imagedestroy($img);

