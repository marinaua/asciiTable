<?php
namespace ASCIITable;

use ASCIITable\Actions\ActionInterface;
use ASCIITable\Actions\MarginAction;
use ASCIITable\Actions\UpperCaseAction;
use ASCIITable\Structure\Cell;
use ASCIITable\Structure\CellInterface;

class ActionManager
{

    protected $eachCellActions = [];
    protected $columnsActions = [];
    protected $cellActions = [];
    protected $headActions = [];

    /**
     * @param ActionInterface $action
     */
    public function addEachCellAction(ActionInterface $action)
    {
        $this->eachCellActions[] = $action;
    }

    /**
     * @param $columnIndex
     * @param ActionInterface $action
     */
    public function addColumnAction($columnIndex, ActionInterface $action)
    {
        $this->columnsActions[$columnIndex][] = $action;
    }

    /**
     * @param $columnIndex
     * @param $rowIndex
     * @param ActionInterface $action
     */
    public function addCellAction($columnIndex, $rowIndex, ActionInterface $action)
    {
        $this->cellActions[$columnIndex][$rowIndex][] = $action;
    }

    public function addHeadAction(ActionInterface $action){
        $this->headActions[] = $action;
    }

    /**
     * @param CellInterface $cell
     * @return ActionInterface[]
     */
    public function getActionsByCell(CellInterface $cell)
    {
        $resultActions = [];
        if (isset($this->cellActions[$cell->getColumn()][$cell->getRow()])) {
            $resultActions = array_merge($resultActions, $this->cellActions[$cell->getColumn()][$cell->getRow()]);
        }
        if ($cell->getRow() == 0) {
            $resultActions = array_merge($resultActions, $this->headActions);
            return $resultActions;
        }

        if (isset($this->columnsActions[$cell->getColumn()])) {
            $resultActions = array_merge($resultActions, $this->columnsActions[$cell->getColumn()]);
        }
        if (isset($this->eachCellActions)) {
            $resultActions = array_merge($resultActions, $this->eachCellActions);
        }

        return array_unique($resultActions);
    }
}