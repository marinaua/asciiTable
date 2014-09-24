<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marik
 * Date: 23.09.14
 * Time: 23:43
 * To change this template use File | Settings | File Templates.
 */

namespace ASCIITable\Aligns;


use ASCIITable\Structure\CellInterface;

interface AlignInterface {

    /**
     * @param CellInterface $cell
     * @param $width
     * @return mixed
     */
    public function apply(CellInterface $cell, $width);
}