<?php
namespace ASCIITable;

use ASCIITable\Actions\LowerCaseAction;
use ASCIITable\Actions\UpperCaseAction;
use ASCIITable\Actions\AlignLeftAction;
use ASCIITable\Structure\Cell;
use ASCIITable\Structure\Column;
use ASCIITable\Structure\Row;
use ASCIITable\TableDataStore;
use ASCIITable\Structure\Table;
use ASCIITable\Draw\ASCII\ASCIIDrawer;
use ASCIITable\Draw\ASCII\ASCIIAbstractDrawer;
/**
 * Class ASCIITable
 * @package ASCIITable
 */
class ASCIITable
{
    /** @var  TableDataStore $data */
    protected $tableDataStore;
    /** @var  ASCIIDrawer $data */
    protected $drawer;
    
    function __construct() {
        $this->drawer = new ASCIIDrawer();
        $this->drawer->setActionManager(new ActionManager());
        $this->drawer->setAlignManager(new AlignManager());
    }

        /**
     * @param mixed $drawer
     */
    public function setDrawer($drawer)
    {
        $this->drawer = $drawer;
    }

    /**
     * @param TableDataStore $data
     */
    public function setTableDataStore(TableDataStore $data)
    {
        $this->tableDataStore = $data;

    }

    /**
     * @return TableDataStore
     */
    public function getTableDataStore()
    {
        return $this->tableDataStore;
    }

    public function run(){
        $table = new Table();
        $row = new Row();
        $titles = $this->tableDataStore->getTitles();
        $rows = $this->tableDataStore->getRows();

        $i=0;
        foreach($titles as $title) {
            $cell = new Cell($title, $i++,0);
            $row->addCell($cell);
        }
        $table->addRow($row);

        $j = 1;

        foreach($rows as $row) {
            $tableRow = new Row();
            $i = 0;
            foreach($row as $cell){
                $tableRow->addCell(new Cell($cell, $i++, $j));
            }
            $table->addRow($tableRow);
            $j++;
        }
        $this->drawer->setTable($table);
    }

    public function draw()
    {
        $this->drawer->draw();
    }

}