<?php // ex_ws_soap.php

try {
    $client = new SoapClient('http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?WSDL', array('trace' => 1));
    $frete = $client->CalcPrecoPrazo(array(
			'nCdEmpresa' => '',
			'sDsSenha' => '',
			'nCdServico' => '41106', // pac sem contrato
			'sCepOrigem' => 31030430,
			'nCepDestino' => 35400000,
			'nVlPeso' => 0.3,
			'nCdFormato' => 1, // caixa/pacote
			'nVlComprimento' => 30,
			'nVlAltura' => 5,
			'nVlLargura' => 20,
			'nVlDiametro' => 0,
			'sCdMaoPropria' => 'N',
			'nVlValorDeclarado' => 0,
			'sCdAvisoRecebimento' => 'N'
		));
	
	$result = $frete->CalcPrecoPrazoResult->Servicos->cServico;
    if ($result->MsgErro != '') {
        throw new Exception($result->MsgErro);
    } else {
        echo "Frete: " .
            $result->Valor .
            "<br />Prazo: " .
            $result->PrazoEntrega .
            " dia(s)";
    }

} catch (SoapFault $se) {
    echo 'Erro no Soap: ' . $se->getMessage();
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
    echo "<h1>REQUISIÇÃO:</h1><pre>";
    echo $client->__getLastRequestHeaders();
    echo htmlentities($client->__getLastRequest()); // xml
    echo "<h1>RESPOSTA:</h1>";
    echo $client->__getLastResponseHeaders();
    echo htmlentities($client->__getLastResponse()); // xml
}


