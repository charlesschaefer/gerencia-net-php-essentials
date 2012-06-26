<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

/** FORMAS GEOMÉTRICAS */

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$preto = imagecolorallocate($nova_img, 0, 0, 0); // preto
$vermelho = imagecolorallocate($nova_img, 255, 0, 0); // vermelho

// cria um retângulo vermelho em um quadro preto
imagefilledrectangle($nova_img, 100, 100, 500, 300, $vermelho);

// salva a imagem em arquivo
imagepng($nova_img, '/tmp/retangulo.png');
// remove a imagem da memória
imagedestroy($nova_img);
