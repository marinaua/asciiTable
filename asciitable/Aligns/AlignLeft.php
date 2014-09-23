<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marik
 * Date: 24.09.14
 * Time: 0:22
 * To change this template use File | Settings | File Templates.
 */

namespace ASCIITable\Aligns;


class AlignLeft implements AlignInterface {

    /**
     * @param string $string
     * @param int $width
     * @return string
     */
    public function apply($string, $width)
    {
        return str_pad($string, $width , " ");
    }
}