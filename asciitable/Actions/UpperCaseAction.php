<?php
namespace ASCIITable\Actions;

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