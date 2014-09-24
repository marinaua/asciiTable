<?php
namespace ASCIITable\Aligns;


use ASCIITable\Structure\CellInterface;

class AlignRight implements AlignInterface {

    /**
     * @param CellInterface $cell
     * @param $width
     * @return mixed|string
     */
    public function apply(CellInterface $cell, $width)
    {
        return str_pad($cell->getRenderedValue(), $width , " ", STR_PAD_LEFT);
    }
}