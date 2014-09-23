<?php
namespace ASCIITable\Actions;

interface ActionInterface {

    /**
     * @param $string
     * @return string
     */
    public function apply($string);
}