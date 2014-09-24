<?php
namespace ASCIITable\Reader;

use ASCIITable\TableDataStore;

/**
 * Class ArrayReader
 * @package ASCIITable\Reader
 */
class ArrayReader implements ReaderInterface
{
    /** @var TableDataStore $tableDataStore */
    protected $tableDataStore;

    /**
     * @param array $array
     */
    public function read($array)
    {
        $this->tableDataStore = new TableDataStore();
        $this->extractTitles($array);
        $this->extractRows($array);
    }

    /**
     * @return TableDataStore
     */
    public function getTableDataStore()
    {
        return $this->tableDataStore;
    }

    /**
     * @param array $array
     */
    protected function extractTitles(array $array)
    {
        $titles = [];
        foreach ($array as $elements) {
            $titles = array_merge($titles, array_keys($elements));
        }
        $this->tableDataStore->setTitles(array_unique($titles));
    }

    /**
     * @param array $array
     */
    protected function extractRows(array $array)
    {
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