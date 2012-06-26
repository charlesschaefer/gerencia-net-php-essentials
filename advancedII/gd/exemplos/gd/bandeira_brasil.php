<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);
if (function_exists('imageantialias')) {
	// liga o antialias se estiver habilitado
	imageantialias($nova_img, true);
}

// fundo da bandeira
$verde = imagecolorallocate($nova_img, 0, 255, 0); // verde
// losango
$amarelo = imagecolorallocate($nova_img, 255, 255, 0); // amarelo
// círculo
$azul = imagecolorallocate($nova_img, 0, 0, 255); // azul

/////////////////////////////////////////////////////////////////////////////
// CRIA O LOSANGO AMARELO DA BANDEIRA
/////////////////////////////////////////////////////////////////////////////

$points = array(
	300, 40, // centro topo
	40, 200, // esquerda centro
	300, 360, // centro fundo
	560, 200 // direita centro
);
imagefilledpolygon($nova_img, $points, 4, $amarelo);

/////////////////////////////////////////////////////////////////////////////
// CRIA O CÍRCULO AZUL DA BANDEIRA
/////////////////////////////////////////////////////////////////////////////
imagefilledarc($nova_img, 300, 200, 200, 200, 0, 360, $azul, IMG_ARC_PIE);


// salva a imagem em arquivo
imagepng($nova_img, '/tmp/bandeira.png');
// remove a imagem da memória
imagedestroy($nova_img);

