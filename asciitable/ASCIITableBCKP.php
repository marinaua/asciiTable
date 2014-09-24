<?php
namespace ASCIITable;


class ASCIITableBCKP
{
    private $tableDataStoreData;
    private $data;
    private $titles;
    private $ascii;

    /**
     * @param TableDataStore $data
     */
    public function setData(TableDataStore $data)
    {
        $this->tableDataStoreData = $data;
    }

    /**
     * @return TableDataStore
     */
    public function getData()
    {
        return $this->data;
    }

    public function draw()
    {
        $this->data = $this->tableDataStoreData->getData();
        $this->setTitlesArray();
        $this->ascii = $this->getHead();
        $this->ascii[] = $this->getBody();
        $this->ascii[] = $this->getFooter();

        echo implode(PHP_EOL, $this->ascii);
    }

    private function setTitlesArray() {

    }

    private function getHead(){
        return array($this->getSeparator(), vsprintf($this->getDataLineFormat(), $this->titles), $this->getSeparator());
    }

    private function getBody(){
        $ascii = [];
        foreach ($this->data as $element) {
            $rows = [];
            foreach ($this->titles as $title) {
                if (array_key_exists($title, $element)) {
                    $rows[] = $element[$title];
                } else {
                    $rows[] = " ";
                }
            }
            $ascii[] = vsprintf($this->getDataLineFormat(), $rows);
        }
        return implode(PHP_EOL, $ascii);
    }

    private function getFooter() {
        return $this->getSeparator();
    }

    private function getSeparator() {
        $len = $this->getColumnLen();
        foreach ($len as $element) {
            $sep[] = str_repeat("-", $element);
        }
        return "+-" . implode("-+-", $sep) . "-+";
    }

    private function getDataLineFormat() {
        $len = $this->getColumnLen();
        foreach ($len as $element) {
            $line[] = "%-{$element}s";
        }
        return "| " . implode(" | ", $line) . " |";
    }

    private function getColumnLen(){
        $len = array_map("strlen", $this->titles);
        foreach ($this->data as $element) {
            foreach ($this->titles as $pos => $title) {
                if (array_key_exists($title, $element)) {
                    $len[$pos] = max($len[$pos], strlen($element[$title]));
                }
            }
        }
        return $len;
    }
}