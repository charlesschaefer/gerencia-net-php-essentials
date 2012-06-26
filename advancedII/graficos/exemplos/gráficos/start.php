<?php
require_once 'pChart/class/pDraw.class.php';
require_once 'pChart/class/pImage.class.php';
require_once 'pChart/class/pData.class.php';

// Exemplo extraido do site da lib

// precisamos ter dados para montar os gráficos
$DataSet = new pData;

// Adicionando os pontos de um gráfico de linha
// horas de trabalho na semana
$DataSet->addPoints(array(8, 9, 11, 6.5, 6, 5), "Joao"); // João
$DataSet->addPoints(array(7.5, 8, 7.5, 10, 6, 6), "Pedro"); // Pedro
$DataSet->setAxisName(0, 'Horas');
// unidade
$DataSet->setAxisUnit(0, 'h');


// Labels
$DataSet->addPoints(
	array('Segunda', 'Terça', 'Quarta','Quinta', 'Sexta', 'Sábado'),
	'Dias'
);
$DataSet->setSerieDescription('Dias', 'Dias da Semana');
$DataSet->setAbscissa('Dias');


// Inicializando o gráfico - Largura e Altura
$Graph = new pImage(700,230, $DataSet);
// Fonte padrão para os textos
$Graph->setFontProperties(array('FontName' => "pChart/fonts/verdana.ttf", 'FontSize' => 8));
// Área utilizada para plotar o gráfico - x1, y1, x2, y2
$Graph->setGraphArea(50,40,670,190);

// RGB, Subticks no eixo, Fundo cores alternadas
// ver: http://wiki.pchart.net/doc.doc.draw.scale.html
$scale = array('GridR' => 150, 'GridG' => 150, 'GridB' => 150, 'DrawSubTicks' => true, 'CycleBackground' => true);
$Graph->drawScale($scale);

$Graph->drawLineChart();


// Finaliza o gráfico

// colocando a legenda dos valores
$Graph->drawLegend(540,25,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
// Fonte do título
$Graph->setFontProperties(array('FontName' => "pChart/fonts/verdana.ttf", 'FontSize' => 10));
// título
$Graph->drawText(60, 20, "Horas Trabalhadas");


// Cria a imagem e salva em arquivo
//$Graph->autoOutput('/tmp/teste.png');
// Cria a imagem e devolve para o browser
$Graph->autoOutput();

?>
