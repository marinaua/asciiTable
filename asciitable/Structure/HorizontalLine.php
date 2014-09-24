<?php
namespace ASCIITable\Structure;

/**
 * Class HorizontalLine
 * @package ASCIITable\Structure
 */
class HorizontalLine implements HorizontalLineInterface
{
    /** @var Row $row  */
    protected $row;

    /**
     *
     * @param Row $row
     */
    public function __construct(Row $row)
    {
        $this->row = $row;
    }
}