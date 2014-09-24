<?php
namespace ASCIITable;

use ASCIITable\Draw\DrawerInterface;

/**
 * Class ASCIITableInterface
 * @package ASCIITable
 */
interface ASCIITableInterface
{
    /**
     * @param DrawerInterface $drawer
     * @return void
     */
    public function setDrawer(DrawerInterface $drawer);

    /**
     * @return DrawerInterface
     */
    public function getDrawer();

    /**
     * @param TableDataStore $data
     * @return void
     */
    public function setTableDataStore(TableDataStore $data);

    /**
     * @return TableDataStore
     */
    public function getTableDataStore();

    /**
     * @return void
     */
    public function run();

    /**
     * @return void
     */
    public function draw();
}
