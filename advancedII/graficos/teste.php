<?php // advancedII/graficos/teste.php

$dados = array(
    'Joao' => array(8, 9, 11, 6.5, 6, 5),
    'Pedro' => array(7.5, 8, 7.5, 10, 6, 6)
);

graficoLinha($dados, 'barra');

/**
 * Gera um gráfico de linha
 * @param array $dados Array no formato array('Label' => array(pontos))
 * @param string $tipo linha ou barra
 */
function grafico($dados, $tipo = 'linha') {

    require_once 'exemplos/graficos/pChart/class/pDraw.class.php';
    require_once 'exemplos/graficos/pChart/class/pImage.class.php';
    require_once 'exemplos/graficos/pChart/class/pData.class.php';

    // precisamos ter dados para montar os gráficos
    $DataSet = new pData;

    // Adicionando os pontos de um gráfico de linha
    // horas de trabalho na semana
    foreach ($dados as $label => $pontos) {
        $DataSet->addPoints($pontos, $label);
    }

    $DataSet->setAxisName(0, 'Horas');
    // unidade
    $DataSet->setAxisUnit(0, 'h');

    $settings = array("R"=>229,"G"=>11,"B"=>11,"Alpha"=>80);
    $DataSet->setPalette("Joao",$settings);

    // Labels
    $DataSet->addPoints(
	    array('Segunda', 'Terça', 'Quarta','Quinta', 'Sexta', 'Sábado'),
	    'Dias'
    );
    $DataSet->setSerieDescription('Dias', 'Dias da Semana');
    $DataSet->setAbscissa('Dias');

    $Graph = new pImage(700, 230, $DataSet);
    $Graph->setFontProperties(array('FontName' => 'exemplos/graficos/pChart/fonts/verdana.ttf', 'FontSize' => 8));

    $Graph->setGraphArea(50, 40, 670, 190);

    $scale = array('GridR' => 150, 'GridG' => 150, 'GridB' => 150, 'DrawSubTicks' => true, 'CycleBackground' => true);
    $Graph->drawScale($scale);

    if ($tipo == 'linha' ) {
        $Graph->drawLineChart();
    } else {
        $Graph->drawBarChart();
    }

    $Graph->drawLegend(540, 25, array('Style' => LEGEND_ROUND, 'Mode' => LEGEND_VERTICAL));

    $Graph->drawText(60, 20, "Horas Trabalhadas");

    $Graph->autoOutput();
}


