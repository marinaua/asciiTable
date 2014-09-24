<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marik
 * Date: 24.09.14
 * Time: 0:22
 * To change this template use File | Settings | File Templates.
 */

namespace ASCIITable\Aligns;


use ASCIITable\Structure\CellInterface;

class AlignLeft implements AlignInterface {

    /**
     * @param CellInterface $cell
     * @param $width
     * @return mixed|string
     */
    public function apply(CellInterface $cell, $width)
    {
        return str_pad($cell->getRenderedValue(), $width , " ");
    }
}