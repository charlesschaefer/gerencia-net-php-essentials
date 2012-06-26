<?php // poo/Widget/Categoria.php

namespace Widget;


class Categoria implements iWidget {
    public $data = array();

    public function __set($var, $val) {
        $this->data[$var] = $val;
    }
    public function __get($var) {
        return $this->data[$var];
    }
    public function __isset($var) {
        return isset($this->data[$var]);
    }
    public function __unset($var) {
        unset($this->data[$var]);
    }

    public function show() {
        // que show?
    }
    public function setData($data) {
        // e o show?
    }
}



