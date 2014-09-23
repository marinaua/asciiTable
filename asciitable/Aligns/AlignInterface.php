<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marik
 * Date: 23.09.14
 * Time: 23:43
 * To change this template use File | Settings | File Templates.
 */

namespace ASCIITable\Aligns;


interface AlignInterface {

    /**
     * @param string $string
     * @param int $width
     * @return string
     */
    public function apply($string, $width);
}