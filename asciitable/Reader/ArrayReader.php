<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marik
 * Date: 16.09.14
 * Time: 19:58
 * To change this template use File | Settings | File Templates.
 */
namespace ASCIITable\Reader;

use ASCIITable\TableDataStore;

class ArrayReader implements ReaderInterface
{
    private $tableDataStore;

    public function read($array)
    {
        $this->tableDataStore = new TableDataStore();
        $this->extractTitles($array);
        $this->extractRows($array);
    }

    public function getTableDataStore(){
        return $this->tableDataStore;
    }

    /**
     * @param $array
     */
    protected function extractTitles($array)
    {
        $titles=[];
        foreach ($array as $elements) {
            $titles = array_merge($titles, array_keys($elements));
        }
        $this->tableDataStore->setTitles(array_unique($titles));
    }

    protected function extractRows($array){
        $data = [];
        foreach ($array as $element) {
            $rows = [];
            foreach ($this->tableDataStore->getTitles() as $title) {
                if (array_key_exists($title, $element)) {
                    $rows[] = $element[$title];
                } else {
                    $rows[] = '';
                }
            }
            $data[] = $rows;
        }
        $this->tableDataStore->setRows($data);
    }

}