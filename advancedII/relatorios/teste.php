<?php // advancedII/relatorios/teste.php

if (isset($_POST['enviar'])) {

    require_once 'report.inc.php';

    $report = new report('http://localhost', 8080, 'birt');
    //$report = new report('http://192.168.3.100', 8080, 'birt');
    $curso = $_POST['curso'];
    
    $report->setFormat('html');
    $report->setNav('S'); // com navegação
    // $report->setNav('N'); // sem navegação. mostra tudo!
    
    $report->setParam('nomeCurso', $curso);
    
    $report->setFile('report/curso.rptdesign');
    
    $report->display();
    
}
?>

<form method="post">
    Buscar: <input type="text" name="curso" /><br />
    <input type="submit" name="enviar" value="Buscar" />
</form>

