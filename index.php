<?php
use ASCIITable\Reader\ArrayReader;
use ASCIITable\ASCIITable;
use ASCIITable\Draw\ASCII\ASCIIDrawer;
use ASCIITable\ActionManager;
use ASCIITable\Actions\PaddingAction;
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

$arrayReader = new ArrayReader(); // Create instance of ArrayReader according to expected data
$arrayReader->read($data); // Read this data and store it in storage component TableDataStore
$tableDataStore = $arrayReader->getTableDataStore(); // Get TableDataStore object from readed data

// Create an object of main project component and set default settings (Formatting, Aligning, Drawer)
$asciiTable = new ASCIITable();
$asciiTable->setTableDataStore($tableDataStore); // Set data to work with

// If needed, we can add formatting actions for all cells, concrete cell, header, column
$actionManager = new ActionManager();
// Set default padding to cell in 3d column and 2nd row
$actionManager->addCellAction(0, 2, new LowerCaseAction());
// Set custom padding (2 spaces left and 6 spaces right) to 3d column
$actionManager->addColumnAction(2, new PaddingAction());
// Set all cells in 2nd column to upper case
$actionManager->addColumnAction(2, new UpperCaseAction());
// Set head row to upper case
$actionManager->addHeadAction(new UpperCaseAction());
// Set lower case to cell in 1st column and 1st row
$actionManager->addCellAction(0, 0, new LowerCaseAction());
// Set each cell padding
$actionManager->addEachCellAction(new PaddingAction());

// If needed, we can add aligning actions for all cells, header, column
$alignManager = new AlignManager();
// Set head align to center
$alignManager->setHeadAlign(new AlignCenter());
// Set 1st column align to right
$alignManager->setColumnAlign(0, new AlignRight());
// Set 1st column align to right
$alignManager->setColumnAlign(2, new AlignCenter());

// Optionally we can use ustom drawer with setted formatting actions and align actions
$drawer = new ASCIIDrawer();
$drawer->setActionManager($actionManager);
$drawer->setAlignManager($alignManager);

// Set drawer to our main object
$asciiTable->setDrawer($drawer);
// Data processing
$asciiTable->run();
// Drawing data
$asciiTable->draw();
