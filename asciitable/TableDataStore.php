<?php
namespace ASCIITable;
use \ArrayIterator;
use ASCIITable\Exceptions\ASCIIException;

/**
 * Class TableDataStore
 * @package ASCIITable
 */
class TableDataStore {

    /** @var array $titles All titles */
    protected $titles;
    /** @var array $rows All data excluding titles*/
    protected $rows;

    /**
     * @param Row[] $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return Row[]
     */
    public function getRows()
    {

        return $this->rows;
    }

    /**
     * @param array $titles
     */
    public function setTitles($titles)
    {
        $this->titles = $titles;
    }

    /**
     * @return array
     */
    public function getTitles()
    {
        return $this->titles;
    }
}