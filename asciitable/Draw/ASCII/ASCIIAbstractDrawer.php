<?php
namespace ASCIITable\Draw\ASCII;

use ASCIITable\ActionManager;
use ASCIITable\Actions\ActionInterface;
use ASCIITable\AlignManager;
use ASCIITable\ASCIITableInterface;
use ASCIITable\Structure\CellInterface;
use ASCIITable\Structure\Table;
use ASCIITable\Draw\DrawerInterface;

/**
 * Class ASCIIAbstractDrawer
 * @package ASCIITable\Draw\ASCII
 */
abstract class ASCIIAbstractDrawer implements DrawerInterface
{

    /** @var  ActionManager $actionManager */
    protected $actionManager;
    /** @var  Table $table */
    protected $table;
    /** @var  int $columnLengths*/
    protected $columnLengths;
    /** @var  AlignManager $$alignManager */
    protected $alignManager;

    /**
     * @param AlignManager $alignManager
     */
    public function setAlignManager($alignManager)
    {
        $this->alignManager = $alignManager;
    }

    /**
     * @param ActionManager $actionManager
     */
    public function setActionManager(ActionManager $actionManager)
    {
        $this->actionManager = $actionManager;
    }

    /**
     * @param Table $table
     */
    public function setTable(Table $table)
    {
        $this->table = $table;
    }

    /**
     * @return Table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param CellInterface $cell
     * @param ActionInterface[] $actions
     * @return string
     */
    protected function applyActions(CellInterface $cell, array $actions)
    {
        $string = $cell->getValue();
        foreach ($actions as $action) {
            $string = $action->apply($string);
        }

        return $string;
    }

    /**
     * @return void
     */
    protected function calculateCellsLengths()
    {
        $titles = $this->table->getHeadRow()->getCells();
        $rows = $this->table->getRows();
        foreach ($titles as $key => $title) {
            $titles[$key] = $this->renderCell($title);
        }
        $len = array_map("strlen", $titles);

        foreach ($rows as $row) {
            foreach ($titles as $pos => $title) {
                $cell = $row->getCells()[$pos];

                $cellValue = $this->renderCell($cell);
                $len[$pos] = max($len[$pos], strlen($cellValue));
            }
        }
        $this->columnLengths = $len;
    }

    /**
     * @param CellInterface $cell
     * @param bool $align
     * @return string
     */
    protected function renderCell(CellInterface $cell, $align = false)
    {
        if ('' == $cell->getRenderedValue()) {
            $actions = $this->actionManager->getActionsByCell($cell);
            $cellValue = $this->applyActions($cell, $actions);
            $cell->setRenderedValue($cellValue);
        }
        if (true == $align) {
            $alignment = $this->alignManager->getAlignment($cell);
            if (false == is_null($alignment)) {
                $cellValue = $alignment->apply($cell, $this->columnLengths[$cell->getColumn()]);
            }
        }

        return $cellValue;
    }
}