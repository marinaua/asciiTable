<?php
namespace ASCIITable\Aligns;

use ASCIITable\Structure\CellInterface;

/**
 * Class AlignInterface
 * @package ASCIITable\Aligns
 */
interface AlignInterface
{

    /**
     * @param CellInterface $cell
     * @param $width
     * @return mixed
     */
    public function apply(CellInterface $cell, $width);
}