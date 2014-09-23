<?php
namespace ASCIITable\Aligns;


class AlignCenter implements AlignInterface {

    /**
     * @param string $string
     * @param int $width
     * @return string
     */
    public function apply($string, $width)
    {
        return str_pad($string, $width , " ", STR_PAD_BOTH);
    }
}