<?php
namespace ASCIITable;

use ASCIITable\Aligns\AlignInterface;
use ASCIITable\Aligns\AlignLeft;
use ASCIITable\Structure\CellInterface;

/**
 * Class AlignManager
 * @package ASCIITable
 */
class AlignManager
{
    /** @var AlignInterface $headAlign | null  */
    protected $headAlign = null;
    /** @var AlignInterface[] $columnAlign */
    protected $columnAlign = [];
    /** @var AlignInterface $eachCellAlign | null  */
    protected $eachCellAlign = null;

    public function __construct()
    {
        $this->eachCellAlign = new AlignLeft();
        $this->headAlign = new AlignLeft();
    }


    /**
     * @param AlignInterface $align
     */
    public function setHeadAlign(AlignInterface $align)
    {
        $this->headAlign = $align;
    }

    /**
     * @param int $columnIndex
     * @param AlignInterface $align
     */
    public function setColumnAlign($columnIndex, AlignInterface $align)
    {
        $this->columnAlign[$columnIndex] = $align;
    }

    /**
     * @param AlignInterface $align
     */
    public function setEachCellAlign(AlignInterface $align)
    {
        $this->eachCellAlign = $align;
    }

    /**
     *
     * @param CellInterface $cell
     * @return AlignInterface
     */
    public function getAlignment(CellInterface $cell)
    {
        if ((false == is_null($this->headAlign)) && $cell->getRow() == 0) {
            return $this->headAlign;
        } else {
            if (array_key_exists($cell->getColumn(), $this->columnAlign)) {
                return $this->columnAlign[$cell->getColumn()];
            } else {
                if (false == is_null($this->eachCellAlign)) {
                    return $this->eachCellAlign;
                } else {
                    return null;
                }
            }
        }
    }
}