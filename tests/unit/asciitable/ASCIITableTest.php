<?php

class ASIITableTest extends \PHPUnit_Framework_TestCase {

    /** @var  \ASCIITable\ASCIITable */
    protected $asciitable;

    protected function setUp()
    {
        $this->asciitable = new \ASCIITable\ASCIITable();
    }

    /**
     * @test
     */
    public function setGetDrawer(){
        $mockAsciiDrawer = $this->getMock('\ASCIITable\Draw\ASCII\ASCIIDrawer');
        $this->asciitable->setDrawer($mockAsciiDrawer );
        $asciiDrawer = $this->asciitable->getDrawer();

        $this->assertSame($mockAsciiDrawer,$asciiDrawer);
    }

}