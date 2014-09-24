<?php

namespace ASCIITable\Structure;

/**
 * Class Row
 * @package ASCIITable\Structure
 */
class Row implements RowInterface
{

    /** @var array cells */
    protected $cells = [];

    /**
     * @param Cell $cell
     */
    public function addCell(Cell $cell)
    {
        $this->cells[] = $cell;
    }

    /**
     * @param Cell[] $cells
     */
    public function addCells(array $cells)
    {
        $this->cells = $cells;
    }

    /**
     * @return Cell[]
     */
    public function getCells()
    {
        return $this->cells;
    }

}
