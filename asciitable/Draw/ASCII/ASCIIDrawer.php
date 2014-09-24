<?php
namespace ASCIITable\Draw\ASCII;

use ASCIITable\Draw\ASCII\ASCIIDrawerHeadBuilder;
use ASCIITable\Draw\ASCIIDrawerHead;

/**
 * Class ASCIIDrawer
 * @package ASCIITable\Draw\ASCII
 */
class ASCIIDrawer extends ASCIIAbstractDrawer
{

    const V_LINE = '|';
    const CORNER = '+';
    const H_LINE = '-';

    /**
     * @return string
     */
    public function build()
    {
        $this->calculateCellsLengths();

        $resultString = '';
        $resultString .= $this->buildHorizontalLine();
        $resultString .= $this->buildHeaderRow();
        $resultString .= $this->buildHorizontalLine();
        $resultString .= $this->buildRows();
        $resultString .= $this->buildHorizontalLine();

        return $resultString;
    }

    /**
     * @return string
     */
    protected function buildHorizontalLine()
    {
        $resultString = [];
        foreach ($this->columnLengths as $length) {
            $resultString[] = str_repeat(self::H_LINE, $length);
        }
        $resultString = self::CORNER . implode(self::CORNER, $resultString) . self::CORNER;

        return $resultString . PHP_EOL;
    }

    /**
     * @return string
     */
    protected function buildHeaderRow()
    {
        $result = '';
        foreach ($this->table->getHeadRow()->getCells() as $cell) {
            $result .= self::V_LINE . $this->renderCell($cell, true);
        }
        $result .= self::V_LINE;

        return $result . PHP_EOL;
    }

    /**
     * @return string
     */
    protected function buildRows()
    {
        $result = '';
        foreach ($this->table->getRows() as $row) {
            foreach ($row->getCells() as $cell) {
                $result .= self::V_LINE . $this->renderCell($cell, true);
            }
            $result .= self::V_LINE . PHP_EOL;
        }

        return $result;
    }

    /**
     * @return void
     */
    public function draw()
    {
        echo $this->build();
    }
}