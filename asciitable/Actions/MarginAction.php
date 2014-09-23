<?php
namespace ASCIITable\Actions;

/**
 * Class MarginAction
 * @package ASCIITable\Actions
 */
class MarginAction extends AbstractAction {

    protected $margin;

    function __construct($margin = ' ')
    {
        $this->margin=$margin;
    }

    /**
     * @param $string
     *
     * @return string string
     */
    public function apply($string){
        return $this->margin . $string . $this->margin;
    }
}