<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$vermelho = imagecolorallocate($nova_img, 255, 255, 0); // amarelo
$branco = imagecolorallocate($nova_img, 255, 255, 255); // branco

// cria uma elipse
imagefilledellipse($nova_img, 200, 200, 130, 200, $branco); // quase um ovo :)

// salva a imagem em arquivo
imagepng($nova_img, '/tmp/elipse.png');
// remove a imagem da memória
imagedestroy($nova_img);

