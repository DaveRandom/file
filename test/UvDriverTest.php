<?php

namespace Amp\File\Test;

class UvDriverTest extends DriverTest {
    protected function setUp() {
        if (\extension_loaded("uv")) {
            $reactor = new \Amp\UvReactor;
            \Amp\reactor($reactor);
            $driver = new \Amp\File\UvDriver($reactor);
            \Amp\File\filesystem($driver);
            parent::setUp();
        } else {
            $this->markTestSkipped(
                "php-uv extension not loaded"
            );
        }
    }
}
