<?php
namespace ASCIITable\Actions;

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