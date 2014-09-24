<?php
namespace ASCIITable\Actions;

/**
 * Class ActionInterface
 * @package ASCIITable\Actions
 */
interface ActionInterface
{

    /**
     * @param $string
     * @return string
     */
    public function apply($string);
}