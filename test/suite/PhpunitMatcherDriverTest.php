<?php

namespace Eloquent\Phony\Phpunit;

use PHPUnit\Framework\TestCase;

class PhpunitMatcherDriverTest extends TestCase
{
    protected function setUp()
    {
        $this->subject = new PhpunitMatcherDriver();

        $this->matcher = $this->equalTo('x');
    }

    public function testIsAvailable()
    {
        $this->assertTrue($this->subject->isAvailable());
    }

    public function testMatcherClassNames()
    {
        $this->assertSame(['PHPUnit\Framework\Constraint\Constraint'], $this->subject->matcherClassNames());
    }

    public function testWrapMatcher()
    {
        $this->assertEquals(new PhpunitMatcher($this->matcher), $this->subject->wrapMatcher($this->matcher));
    }
}
