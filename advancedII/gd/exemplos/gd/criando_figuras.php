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

/////////////////////////////////////////////////////
///  círculo
/////////////////////////////////////////////////////

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$vermelho = imagecolorallocate($nova_img, 255, 0, 0); // vermelho
$preto = imagecolorallocate($nova_img, 0, 0, 0); // preto

// cria um retângulo vermelho em um quadro preto
imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_PIE); // pizza preenchida
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_PIE | IMG_ARC_NOFILL); // "aro" incompleto
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_NOFILL | IMG_ARC_EDGED); // pizza sem preenchimento
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_CHORD); // "corda" preenchida. Só une os pontos iniciais e finais ao centro
//imagefilledarc($nova_img, 200, 200, 100, 100, 0, 280, $preto, IMG_ARC_CHORD | IMG_ARC_NOFILL | IMG_ARC_EDGED); // "corda" só com as bordas

// salva a imagem em arquivo
imagepng($nova_img, '/tmp/circulo.png');
// remove a imagem da memória
imagedestroy($nova_img);

/////////////////////////////////////////////////////
///  elipse
/////////////////////////////////////////////////////

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$vermelho = imagecolorallocate($nova_img, 255, 255, 0); // amarelo
$branco = imagecolorallocate($nova_img, 255, 255, 255); // branco

// cria um retângulo vermelho em um quadro preto
imagefilledellipse($nova_img, 200, 200, 130, 200, $branco); // quase um ovo :)

// salva a imagem em arquivo
imagepng($nova_img, '/tmp/elipse.png');
// remove a imagem da memória
imagedestroy($nova_img);


/////////////////////////////////////////////////////
///  losango
/////////////////////////////////////////////////////

// cria uma imagem nova de 600 x 400 px
$nova_img = imagecreate(600, 400);

// cria um recurso para a cor de fundo. Trabalha com valores RGB
$verde = imagecolorallocate($nova_img, 0, 255, 0); // verde
$azul = imagecolorallocate($nova_img, 0, 0, 255); // azul

// cria um retângulo vermelho em um quadro preto
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



?>
