<?php
namespace ASCIITable\Actions;

/**
 * Class PaddingAction
 * @package ASCIITable\Actions
 */
class PaddingAction extends AbstractAction {

    /** @var string  */
    protected $paddingSign;

    /** @var  int */
    protected $paddingLeft;

    /** @var  int */
    protected $paddingRight;

    public function __construct($paddingLeft = 0, $paddingRight = 0, $paddingSign = ' ')
    {
        $this->paddingLeft = $paddingLeft;
        $this->paddingRight = $paddingRight;
        $this->paddingSign = $paddingSign;
    }

    /**
     * @param $string
     *
     * @return string string
     */
    public function apply($string){
        return str_repeat($this->paddingSign, $this->paddingLeft) . $string . str_repeat($this->paddingSign, $this->paddingRight);
    }
}