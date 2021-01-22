<?php
/**
 * AccessorTesterTest.php
 *
 * AccessorTesterTest class
 *
 * php 7.3+
 *
 * @category  None
 * @package   Floor9design\TestingTools\Tests\Unit
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license MIT
 * @version   1.0
 * @link      https://github.com/floor9design-ltd/plugin-core.eventim.co.uk
 * @link      https://floor9design.com
 * @version   1.0
 * @since     File available since Release 1.0
 *
 */

namespace Floor9design\TestingTools\Tests\Unit;

use Floor9design\TestingTools\Exceptions\TestingToolsException;
use Floor9design\TestingTools\Traits\AccessorTesterTrait;
use PHPUnit\Framework\TestCase;

/**
 * AccessorTesterTest
 *
 * Tests the AccessorTester class.
 *
 * @category  None
 * @package   Floor9design\TestingTools\Tests\Unit
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license MIT
 * @version   1.0
 * @link      https://github.com/floor9design-ltd/plugin-core.eventim.co.uk
 * @link      https://floor9design.com
 * @version   1.0
 * @since     File available since Release 1.0
 */
class AccessorTesterTest extends TestCase
{
    // As this is a test of a testing class, we can simply test is with pre-defined objects in states
    use AccessorTesterTrait;

    /**
     * Tests AccessorTesterTrait::accessorTestInts()
     */
    public function testAccessorTestInts(): void
    {
        $test_pass = new class {

            var $foo;

            public function getFoo()
            {
                return $this->foo;
            }

            public function setFoo(int $foo)
            {
                $this->foo = $foo;
            }

        };

        // basic
        $ints = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestInts($ints, $test_pass);

        // basic with limits
        $ints = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 5, 'max' => 10]
            ]
        ];

        $this->accessorTestInts($ints, $test_pass);

        // reformed
        $ints = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 10, 'max' => 5]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestInts($ints, $test_pass);
    }
}

