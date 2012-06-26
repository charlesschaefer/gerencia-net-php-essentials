<?php
function generateText() {
	return strtolower(substr(md5(uniqid('')), 4, 10));
}

session_start();
$texto = $_SESSION['captcha_text'] = generateText();

if (!function_exists('imagecreate')) {
	die('Você precisa da extensão GD para executar este script');
}
// cria um quadro branco
$nova_img = imagecreatetruecolor(200, 200);
// algumas cores que serão utilizadas
$branco = imagecolorallocate($nova_img, 255, 255, 255);
$azul = imagecolorallocate($nova_img, 0, 0, 255);
$vermelho = imagecolorallocate($nova_img, 255, 0, 0);
$verde = imagecolorallocate($nova_img, 0, 255, 0);

// preenche a imagem com branco
imagefill($nova_img, 0, 0, $branco);

$len = strlen($texto);
$cores = array($azul, $vermelho, $verde);
$start_x = 2;
$deslocamento = 17;
// cria o texto usando uma fonte "melhor"
for ($i = 0; $i < $len; $i++) {
	imagettftext($nova_img, 20, 0, $start_x += $deslocamento, 100, $cores[rand(0,2)], "./calligra.ttf", $texto[$i]);
}
imagepng($nova_img, '/tmp/captcha.png');
imagedestroy($nova_img);