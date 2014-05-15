<?php

namespace olund\Flash;

class CFlashTest extends \PHPUnit_Framework_TestCase
{

    public function setup()
    {
        $this->flash = new \olund\Flash\CFlash();
    }

    /**
     * Test if the session is array after a clear WITH restart.
     * @return
     */
    public function testClear()
    {
        $this->flash->clear(true);
        $exp = [];
        $res = $_SESSION['flash'];
        $this->assertEquals($res, $exp, "Session is not array..");
    }

    public function testGet()
    {
        $this->flash->error('test');
        $this->flash->notice('test');
        $this->flash->warning('test');
        $this->flash->success('test');

        $res = $this->flash->get();
        $exp = "<div class=errorMessage><i class='fa fa-times-circle'></i> test</div><div class=noticeMessage><i class='fa fa-info'></i> test</div><div class=warningMessage><i class='fa fa-warning'></i> test</div><div class=successMessage><i class='fa fa-check'></i> test</div>";
        $this->assertEquals($res, $exp, "flash->get() mismatch");
    }

    public function testGetEmpty()
    {
        $res = $this->flash->get();
        $exp = null;
        $this->assertEquals($res, $exp, "flash->get() is not null..");
    }
}
