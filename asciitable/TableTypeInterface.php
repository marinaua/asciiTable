<?php
namespace ASCIITable;

interface TableTypeInterface {
    public function setDrawer($drawer);
    public function getDrawer();
    public function setTableDataStore(TableDataStore $data);
    public function getTableDataStore();
    public function run();
    public function draw();
}
