<?php

namespace olund\Flash;

class CFlashTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test if the session is array after a clear WITH restart.
     * @return
     */
    public function testClearWithRestart()
    {
        $this->flash = new \olund\Flash\CFlash();
        $this->flash->clear(true);
        $this->assertEquals([], $_SESSION['flash']);
    }

    /**
     * Test if the session is null after a clear and the session is not restarted.
     * @return
     */
    public function testClear()
    {
        $this->flash = new \olund\Flash\CFlash();
        $this->flash->clear(false);
        $this->assertEquals(null, $_SESSION['flash']);
    }

    /*
    public function testSuccess()
    {

    }

    public function testGet()
    {
       // $exp = "";

    }*/
}
