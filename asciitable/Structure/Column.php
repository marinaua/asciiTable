<?php
namespace ASCIITable\Structure;

/**
 * Class Column
 * @package ASCIITable\Structure
 */
class Column implements ColumnInterface
{

    /** @var  CellActions */
    protected $actions = [];
    /** @var  int $maxLength */
    protected $maxLength;

    /**
     * @param ActionInterface $action
     */
    public function addAction(ActionInterface $action)
    {
        $this->actions[] = $action;
    }

}