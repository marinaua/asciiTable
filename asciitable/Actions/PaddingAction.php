<?php
namespace ASCIITable\Actions;

/**
 * Class PaddingAction
 * Add left and right padding to string
 * @package ASCIITable\Actions
 */
class PaddingAction extends AbstractAction
{

    /** @var string */
    protected $paddingSign;

    /** @var  int */
    protected $paddingLeft;

    /** @var  int */
    protected $paddingRight;

    /**
     * @param int $paddingLeft
     * @param int $paddingRight
     */
    public function __construct($paddingLeft = 1, $paddingRight = 1)
    {
        $this->paddingLeft = $paddingLeft;
        $this->paddingRight = $paddingRight;
        $this->paddingSign = ' ';
    }

    /**
     * @param $string
     *
     * @return string string
     */
    public function apply($string)
    {
        return str_repeat($this->paddingSign, $this->paddingLeft) . $string . str_repeat(
            $this->paddingSign,
            $this->paddingRight
        );
    }
}