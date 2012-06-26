<?php
require_once 'pChart/class/pDraw.class.php';
require_once 'pChart/class/pImage.class.php';
require_once 'pChart/class/pData.class.php';
require_once 'pChart/class/pPie.class.php';

// Exemplo extraido do site da lib

// precisamos ter dados para montar os gráficos
$DataSet = new pData;

// Adicionando os pontos de um gráfico de pizza
// horas de trabalho na semana
$DataSet->addPoints(array(45, 30, 40), "Serie1"); // valores

$DataSet->setSerieDescription("Serie1","Horas Trabalhadas");

$DataSet->addPoints(array("João", 'Pedro', 'Manuel'),"Labels");
$DataSet->setAbscissa("Labels");

// Inicializando o gráfico - Largura e Altura
$Graph = new pImage(450,230, $DataSet);

$Graph->setFontProperties(array('FontName' => "pChart/fonts/verdana.ttf", 'FontSize' => 10));

// Desenha dois retangulo arredondado
$settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$Graph->drawFilledRectangle(0,0,300,300,$settings);

$Graph->drawRectangle(0,0,299,259,array("R"=>0,"G"=>0,"B"=>0));

$Graph->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>50));

$PieChart = new pPie($Graph,$DataSet);

$PieChart->draw2DPie(160,140,array("DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));

/* Caixa de legenda */ 
$Graph->setShadow(FALSE);
$PieChart->drawPieLegend(15,40,array("Alpha"=>20));


// Cria a imagem e salva em arquivo
//$Graph->autoOutput("/tmp/teste.png");
// Cria a imagem e devolve para o browser
$Graph->autoOutput();

?>
