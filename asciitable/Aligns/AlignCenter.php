<?php
namespace ASCIITable\Aligns;

use ASCIITable\Structure\CellInterface;

/**
 * Class AlignCenter
 * Align string center
 * @package ASCIITable\Aligns
 */
class AlignCenter implements AlignInterface
{

    /**
     * @param CellInterface $cell
     * @param int $width
     * @return string
     */
    public function apply(CellInterface $cell, $width)
    {
        return str_pad($cell->getRenderedValue(), $width, " ", STR_PAD_BOTH);
    }
}