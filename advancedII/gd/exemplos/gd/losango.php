<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$verde = imagecolorallocate($nova_img, 0, 255, 0); // verde
$azul = imagecolorallocate($nova_img, 0, 0, 255); // azul

// cria um lonsango
$points = array(
	140, 5, // centro topo
	40, 80, // esquerda centro
	140, 155, // centro fundo
	240, 80 // direita centro
);
imagefilledpolygon($nova_img, $points, 4, $azul);

// salva a imagem em arquivo
imagepng($nova_img, '/tmp/losango.png');
// remove a imagem da memória
imagedestroy($nova_img);
