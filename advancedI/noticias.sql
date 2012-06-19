-- Cria a tabela de notícias para o teste com RSS

CREATE TABLE noticia (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(200) NOT NULL,
	resumo VARCHAR(250),
	noticia TEXT NOT NULL,
	data_criacao DATE NOT NULL DEFAULT '0000-00-00',
	PRIMARY KEY (id)
);

-- inserções automáticas
INSERT INTO noticia VALUES (DEFAULT, 'José Alencar se recupera bem de cirurgia, diz boletim', 'O vice-presidente José Alencar segue internado na UTI (Unidade de Terapia Intensiva) do Hospital Sírio-Libanês, e se recupera bem da cirurgia para retirada de turmores na região abdominal que durou mais de 17 horas, segundo boletim médico divulgado', 'O vice-presidente José Alencar segue internado na UTI (Unidade de Terapia Intensiva) do Hospital Sírio-Libanês, e se recupera bem da cirurgia para retirada de tumores na região abdominal que durou mais de 17 horas, segundo boletim médico divulgado pelo hospital na tarde desta segunda-feira (26). 
<br />
De acordo com a nota, o estado de saúde do vice-presidente é "estável" e os médicos consideram que o paciente está bem, levando-se em conta o tipo de intervenção. "O vice-presidente respira por aparelhos e mantém todos os sinais vitais normais, inclusive com bom funcionamento do rim", diz o texto (leia abaixo a íntegra do boletim médico).', NOW()), (DEFAULT, 'Revenda de casas nos EUA aumenta 6,5% no mês em dezembro', 'SÃO PAULO - A venda de casas antigas nos Estados Unidos subiu 6,5% em dezembro do ano passado ante novembro, para uma taxa anual ajustada sazonalmente de 4,74 milhões de unidades. No confronto com o mês final de 2007 (4,91 milhões de moradias)', 'SÃO PAULO - A venda de casas antigas nos Estados Unidos subiu 6,5% em dezembro do ano passado ante novembro, para uma taxa anual ajustada sazonalmente de 4,74 milhões de unidades. No confronto com o mês final de 2007 (4,91 milhões de moradias), contudo, foi verificada queda de 3,5%. Os números são da Associação Nacional de Corretores de Imóveis dos EUA (NAR, na sigla em inglês).
<br />
Para 2008 como um todo, houve vendas de 4,912 milhões de casas antigas, o que implica diminuição de 13,1% perante as 5,652 milhões de transações registradas em 2007. "Este é o menor volume desde 1997 [quando existiram vendas de 4,371 milhões de unidades]", observou a NAR em nota em sua página eletrônica. ', NOW());
