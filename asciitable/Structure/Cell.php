<?php
namespace ASCIITable\Structure;

/**
 * Class Cell
 * @package ASCIITable\Structure
 */
class Cell implements CellInterface
{

    /** @var  string $string */
    protected $value;
    /** @var  CellActions */
    protected $actions = [];
    /** @var  int */
    protected $column;
    /** @var  int $row */
    protected $row;
    /** @var  string $renderedValue */
    protected $renderedValue;

    /**
     * @param string $renderedValue
     */
    public function setRenderedValue($renderedValue)
    {
        $this->renderedValue = $renderedValue;
    }

    /**
     * @return string
     */
    public function getRenderedValue()
    {
        return $this->renderedValue;
    }

    /**
     * @return int
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @return int
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     *
     * @param string $string
     * @param int $column
     * @param int $row
     */
    public function __construct($string, $column, $row)
    {
        $this->value = $string;
        $this->column = $column;
        $this->row = $row;
    }


    /**
     * @return int
     */
    public function getLength()
    {
        return strlen($this->value);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->getValue();
    }

}