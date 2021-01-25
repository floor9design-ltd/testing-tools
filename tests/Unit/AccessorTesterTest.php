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
     * Tests AccessorTesterTrait::accessorTestArrays()
     */
    public function testAccessorTestArrays(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // basic
        $arrays = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestArrays($arrays, $test_pass);

        // basic with limits
        $arrays = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['length' => 5, 'array_length' => 10]
            ]
        ];

        $this->accessorTestArrays($arrays, $test_pass);

        // exception
        $arrays = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 10, 'max' => 5]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestIntegers($arrays, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestBooleans()
     */
    public function testAccessorTestBooleans(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // basic
        $booleans = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestBooleans($booleans, $test_pass);

        // basic with limits
        $booleans = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 5, 'max' => 10]
            ]
        ];

        $this->accessorTestFloats($booleans, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestFloats()
     */
    public function testAccessorTestFloats(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // basic
        $floats = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestFloats($floats, $test_pass);

        // basic with limits
        $floats = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 5, 'max' => 10]
            ]
        ];

        $this->accessorTestFloats($floats, $test_pass);

        // exception
        $floats = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 10, 'max' => 5]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestFloats($floats, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestIntegers()
     */
    public function testAccessorTestIntegers(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // basic
        $integers = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestIntegers($integers, $test_pass);

        // basic with limits
        $integers = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 5, 'max' => 10]
            ]
        ];

        $this->accessorTestIntegers($integers, $test_pass);

        // exception
        $integers = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['min' => 10, 'max' => 5]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestIntegers($integers, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestJsons()
     */
    public function testAccessorTestJsons(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // basic
        $jsons = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestJsons($jsons, $test_pass);

        // basic with limits
        $jsons = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => [
                    'number_of_arrays' => 5,
                    'number_of_booleans' => 10,
                    'number_of_floats' => 2,
                    'number_of_integers' => 4,
                    'number_of_strings' => 3
                ]
            ]
        ];

        $this->accessorTestJsons($jsons, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestJsons()
     */
    public function testAccessorTestJsonsArrayException(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // exceptions
        $jsons = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['number_of_arrays' => -1]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestJsons($jsons, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestJsons()
     */
    public function testAccessorTestJsonsBooleanException(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // exceptions
        $jsons = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['number_of_booleans' => -1]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestJsons($jsons, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestJsons()
     */
    public function testAccessorTestJsonsBooleanFloat(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // exceptions
        $jsons = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['number_of_floats' => -1]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestJsons($jsons, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestJsons()
     */
    public function testAccessorTestJsonsBooleanInteger(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // exceptions
        $jsons = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['number_of_integers' => -1]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestJsons($jsons, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestJsons()
     */
    public function testAccessorTestJsonsBooleanString(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // exceptions
        $jsons = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['number_of_strings' => -1]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestJsons($jsons, $test_pass);
    }

    /**
     * Tests AccessorTesterTrait::accessorTestStrings()
     */
    public function testAccessorTestStrings(): void
    {
        $test_pass = $this->createAnonymousTestObject();

        // basic
        $strings = [
            'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo']
        ];

        $this->accessorTestStrings($strings, $test_pass);

        // basic with limits
        $strings = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['length' => 10]
            ]
        ];

        $this->accessorTestStrings($strings, $test_pass);

        // exception
        $strings = [
            'foo' => [
                'getter' => 'getFoo',
                'setter' => 'setFoo',
                'config' => ['length' => -5]
            ]
        ];

        $this->expectException(TestingToolsException::class);
        $this->accessorTestStrings($strings, $test_pass);
    }

    // Internal functions

    /**
     * @return object anonymous object
     */
    private function createAnonymousTestObject(): object
    {
        return new class {

            var $foo;

            public function getFoo()
            {
                return $this->foo;
            }

            public function setFoo($foo)
            {
                $this->foo = $foo;
            }

        };
    }
}

