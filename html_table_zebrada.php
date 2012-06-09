<?php

class HTMLTable {
    public function row() {
        return '<tr>' . PHP_EOL;
    }
    public function cell($data) {
        return '<td>' . $data . '</td>' . PHP_EOL;
    }
    public function closeRow() {
        return '</tr>' . PHP_EOL;
    }
    public function table() {
        return '<table>' . PHP_EOL;
    }
    public function closeTable() {
        return '</table>' . PHP_EOL;
    }
}

class HTMLTableZebrada extends HTMLTable {
    public $idx;
    public function row() {
        $color = (++$this->idx % 2 == 0) ? 'white' : 'silver';
        return "<tr style='background-color:{$color}'>" . PHP_EOL;
    }
    public function closeTable() {
        $this->idx = 0;
        parent::closeTable();
    }
}

$table = new HTMLTableZebrada();
echo $table->table();
echo $table->row();
    echo $table->cell('celula 1');
    echo $table->cell('celula 2');
echo $table->closeRow();
echo $table->row();
    echo $table->cell('celula 3');
    echo $table->cell('celula 4');
echo $table->closeRow();
echo $table->closeTable();


