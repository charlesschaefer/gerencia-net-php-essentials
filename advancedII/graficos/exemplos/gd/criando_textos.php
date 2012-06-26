<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

$nova_img = imagecreate(600, 400);

$branco = imagecolorallocate($nova_img, 255, 255, 255); //fundo branco
$azul = imagecolorallocate($nova_img, 0, 0, 255); // azul

// escreve uma string na imagem, usando a font 2
imagestring($nova_img, 5, 300, 200, "PHPrime: Advanced II", $azul);
imagepng($nova_img, '/tmp/texto.png');
imagedestroy($nova_img);

//////////////////////////////////////////////////////////////////////////////
/// UTILIZANDO UMA FONTE True Type
/////////////////////////////////////////////////////////////////////////////
$nova_img = imagecreate(600, 400);

$branco = imagecolorallocate($nova_img, 255, 255, 255); //fundo branco
$azul = imagecolorallocate($nova_img, 0, 0, 255); // azul

// escreve uma string na imagem, usando uma fonte especial truetype
imagettftext($nova_img, 20, 0, 200, 180, $azul, "./calligra.ttf", "PHPrime: Advanced II");
imagepng($nova_img, '/tmp/texto.png');
imagedestroy($nova_img);

?>
