<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

$img_original = imagecreatefromjpeg('img/ferrari1.jpg');
$largura = imagesx($img_original);
$altura = imagesy($img_original);

// largura máxima = 200
$nlargura = 200;
// altura máxima = 200
$naltura = 200;
if ($largura > $altura) {
   $razao = ceil($nlargura * 100 / $largura);
   $naltura = ceil($altura * ($razao / 100));
} else {
   $razao = ceil($naltura * 100 / $altura);
   $nlargura = ceil($largura * ($razao / 100));
}
$nova_img = imagecreatetruecolor($nlargura, $naltura);

imagecopyresampled($nova_img, $img_original, 0, 0, 0, 0, $nlargura, $naltura, $largura, $altura);
imagejpeg($nova_img, 'img/thumb_ferrari1.jpg');
imagedestroy($nova_img);
imagedestroy($img_original);

?>
