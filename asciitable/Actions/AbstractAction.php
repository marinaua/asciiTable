<?php
namespace ASCIITable\Actions;

/**
 * Class AbstractAction
 * @package ASCIITable\Actions
 */
abstract class AbstractAction implements ActionInterface
{
    /**
     * @return string
     */
    public function __toString()
    {
        return get_called_class();
    }
}