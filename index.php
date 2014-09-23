<?php
use ASCIITable\Reader\ArrayReader;
use ASCIITable\ASCIITable;
use ASCIITable\Draw\ASCII\ASCIIDrawer;
use ASCIITable\ActionManager;
use ASCIITable\Actions\MarginAction;
use ASCIITable\Actions\LowerCaseAction;
use ASCIITable\Actions\UpperCaseAction;
use ASCIITable\Aligns\AlignCenter;
use ASCIITable\AlignManager;
use ASCIITable\Aligns\AlignRight;

require 'vendor/autoload.php';

$data = array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers',
        'Status' => 'Lonely'
    ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
    ),
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink',
        'Value' => 'True'
    ),
);

$arrayReader = new ArrayReader();
$arrayReader->read($data);
$tableDataStore = $arrayReader->getTableDataStore();

$asciiTable = new ASCIITable();
$asciiTable->setTableDataStore($tableDataStore);

$actionManager = new ActionManager();
$actionManager->addCellAction(2, 1, new MarginAction());
$actionManager->addColumnAction(2, new MarginAction());
$actionManager->addColumnAction(2, new UpperCaseAction());
$actionManager->addHeadAction(new UpperCaseAction());
$actionManager->addHeadAction(new MarginAction());
$actionManager->addEachCellAction(new MarginAction());

$alignManager = new AlignManager();
$alignManager->setHeadAlign(new AlignCenter());
$alignManager->setColumnAlign(0, new AlignRight());

$drawer = new ASCIIDrawer();
$drawer->setActionManager($actionManager);
$drawer->setAlignManager($alignManager);

$asciiTable->setDrawer($drawer);
$asciiTable->run();
$asciiTable->draw();
