<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marik
 * Date: 21.09.14
 * Time: 14:30
 * To change this template use File | Settings | File Templates.
 */

namespace ASCIITable\Structure;


class HorizontalLine implements HorizontalLineInterface{

    public $row;
    function __construct(Row $row)
    {
        $this->row=$row;
    }
}