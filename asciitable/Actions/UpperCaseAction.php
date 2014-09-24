<?php
namespace ASCIITable\Actions;

/**
 * Class UpperCaseAction
 * Change case of string to upper
 * @package ASCIITable\Actions
 */
class UpperCaseAction extends AbstractAction {

    /**
     * @param $string
     * 
     * @return string string
     */
    public function apply($string){
        return strtoupper($string);
    }

}