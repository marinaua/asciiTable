<?php
namespace ASCIITable\Structure;


class HorizontalLine implements HorizontalLineInterface{

    public $row;
    
    /**
     * 
     * @param Row $row
     */
    public function __construct(Row $row)
    {
        $this->row=$row;
    }
}