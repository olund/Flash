<?php

namespace olund\Flash;

class CFlashTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test if the session is null after a clear.
     * @return
     */
    public function testClear()
    {
        $flash = new \olund\Flash\CFlash();
        $flash->clear();
        $this->assertEquals(null, $_SESSION['flash']);
    }
}