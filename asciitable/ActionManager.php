<?php
namespace ASCIITable;

use ASCIITable\Actions\ActionInterface;
use ASCIITable\Structure\CellInterface;

/**
 * Class ActionManager
 * @package ASCIITable
 */
class ActionManager
{
    /** @var ActionInterface[] $eachCellActions */
    protected $eachCellActions = [];
    /** @var ActionInterface[] $columnsActions */
    protected $columnsActions = [];
    /** @var ActionInterface[] $cellActions */
    protected $cellActions = [];
    /** @var ActionInterface[] $headActions */
    protected $headActions = [];

    /**
     * @param ActionInterface $action
     */
    public function addEachCellAction(ActionInterface $action)
    {
        $this->eachCellActions[get_class($action)] = $action;
    }

    /**
     * @param $columnIndex
     * @param ActionInterface $action
     */
    public function addColumnAction($columnIndex, ActionInterface $action)
    {
        $this->columnsActions[$columnIndex][get_class($action)] = $action;
    }

    /**
     * @param $columnIndex
     * @param $rowIndex
     * @param ActionInterface $action
     */
    public function addCellAction($columnIndex, $rowIndex, ActionInterface $action)
    {
        $this->cellActions[$columnIndex][$rowIndex][get_class($action)] = $action;
    }

    public function addHeadAction(ActionInterface $action)
    {
        $this->headActions[get_class($action)] = $action;
    }

    /**
     * @param CellInterface $cell
     * @return ActionInterface[]
     */
    public function getActionsByCell(CellInterface $cell)
    {
        $resultActions = [];
        if (isset($this->eachCellActions)) {
            $resultActions = array_merge($resultActions, $this->eachCellActions);
        }
        if (isset($this->columnsActions[$cell->getColumn()])) {
            $resultActions = array_merge($resultActions, $this->columnsActions[$cell->getColumn()]);
        }
        if ($cell->getRow() == 0) {
            $resultActions = array_merge($resultActions, $this->headActions);
            //return $resultActions;
        }
        if (isset($this->cellActions[$cell->getColumn()][$cell->getRow()])) {
            $resultActions = array_merge($resultActions, $this->cellActions[$cell->getColumn()][$cell->getRow()]);
        }
        if(($cell->getColumn() == 2 && $cell->getRow() == 1) ) {
            //var_dump($resultActions);
            //var_dump(array_unique($resultActions));die;
        }

        return array_unique($resultActions);
    }
}