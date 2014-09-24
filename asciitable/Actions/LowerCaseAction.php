<?php
namespace ASCIITable\Actions;

/**
 * Class LowerCaseAction
 * Change case of string to lower
 * @package ASCIITable\Actions
 */
class LowerCaseAction extends AbstractAction {

    /**
     * @param $string
     * 
     * @return string string
     */
    public function apply($string){
        return strtolower($string);
    }

}