<?php //advancedII/gd/thumb.php

$orig = imagecreatefromjpeg('exemplos/gd/img/ferrari1.jpg');

$largura = imagesx($orig);
$altura  = imagesy($orig);

// largura máxima = 200
$nlargura = 200;
// altura máxima = 200
$naltura = 200;
if ($largura > $altura) {
   $razao = ceil($nlargura * 100 / $largura); // ceil = arredonda cima
   $naltura = ceil($altura * ($razao / 100));
} else {
   $razao = ceil($naltura * 100 / $altura);
   $nlargura = ceil($largura * ($razao / 100));
}

$nova = imagecreatetruecolor($nlargura, $naltura);

//imagecopyresized($new_img, $old_img, $dst_x, $dst_y, $src_x, $src_y, $new_w, $new_h, $old_w, $old_h)
//imagecopyresized($nova, $orig, 0, 0, 0, 0, $nlargura, $naltura, $largura, $altura);

imagecopyresampled($nova, $orig, 0, 0, 0, 0, $nlargura, $naltura, $largura, $altura);

//header('Content-type: image/png');
imagepng($nova, 'thumb_ferrari1.png');



