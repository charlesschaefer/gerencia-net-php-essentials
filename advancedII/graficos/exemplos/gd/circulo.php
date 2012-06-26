<?php
if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$vermelho = imagecolorallocate($nova_img, 255, 0, 0); // vermelho
$preto = imagecolorallocate($nova_img, 0, 0, 0); // preto

// cria um círculo
imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_PIE); // pizza preenchida
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_PIE | IMG_ARC_NOFILL); // "aro" incompleto
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_NOFILL | IMG_ARC_EDGED); // pizza sem preenchimento
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_CHORD); // "corda" preenchida. Só une os pontos iniciais e finais ao centro
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_CHORD | IMG_ARC_NOFILL | IMG_ARC_EDGED); // "corda" só com as bordas

// salva a imagem em arquivo
imagepng($nova_img, '/tmp/circulo.png');
// remove a imagem da memória
imagedestroy($nova_img);
