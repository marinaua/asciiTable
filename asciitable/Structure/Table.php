<?php
namespace ASCIITable\Structure;

/**
 * Class Table
 * @package ASCIITable\Structure
 */
class Table implements StructureInterface{

    /** @var Row[] */
    protected $rows=[];

    /**
     * @param Row $row
     */
    public function addRow(Row $row){
        $this->rows[] = $row;
    }

    /**
     * @return \ASCIITable\Structure\Row[]
     */
    public function getRows()
    {
        return array_slice($this->rows,1);
    }

    /**
     * @return Row
     */
    public function getHeadRow(){
        return $this->rows[0];
    }

    /**
     * @param Row[] $rows
     */
    public function setRows(array $rows){
        $this->rows = $rows;
    }
}