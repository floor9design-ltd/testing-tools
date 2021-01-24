<?php
/**
 * AccessorTesterTrait.php
 *
 * AccessorTesterTrait class
 *
 * php 7.3+
 *
 * @category  None
 * @package   Floor9design\TestingTools\Traits
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license   Private software
 * @version   1.0
 * @link      https://github.com/floor9design-ltd/testing-tools
 * @link      https://floor9design.com
 * @since     File available since Release 1.0
 *
 */

namespace Floor9design\TestingTools\Traits;

use Floor9design\TestDataGenerator\Generator;
use Floor9design\TestDataGenerator\GeneratorException;
use Floor9design\TestingTools\Exceptions\TestingToolsException;

/**
 * Class AccessorTesterTrait
 *
 * Provides methods for generating accessors.
 *
 * @category  None
 * @package   Floor9design\TestingTools\Traits
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license   Private software
 * @version   1.0
 * @link      https://github.com/floor9design-ltd/testing-tools
 * @link      https://floor9design.com
 * @since     File available since Release 1.0
 */
trait AccessorTesterTrait
{

    /**
     * @var Generator
     */
    var $generator;

    // Base functions

    // note: by prefixing accessorTest instead of testAccessor it prevents phpunit automatically calling it incorrectly

    /**
     * Tests an array of accessors
     *
     * @param array $arrays
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestArrays(array $arrays, object $object): void
    {
        $this->generator = new Generator();

        foreach ($arrays as $property => $config) {
            if (
                $config['config']['length'] ?? false &&
                is_int($config['config']['length'])
            ) {
                $length = $config['config']['length'];
            } else {
                $length = null;
            }

            if (
                $config['config']['array_length'] ?? false &&
                is_int($config['config']['array_length'])
            ) {
                $array_length = $config['config']['array_length'];
            } else {
                $array_length = null;
            }

            $test_array = $this->generator->randomStringArray($length, $array_length);

            $this->accessorTests($config, $property, $object, $test_array);
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $floats
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestFloats(array $floats, object $object): void
    {
        $this->generator = new Generator();

        foreach ($floats as $property => $config) {
            try {
                if (
                    $config['config']['min'] ?? false &&
                    is_float($config['config']['min'])
                ) {
                    $min = $config['config']['min'];
                } else {
                    $min = null;
                }

                if (
                    $config['config']['max'] ?? false &&
                    is_float($config['config']['max'])
                ) {
                    $max = $config['config']['max'];
                } else {
                    $max = null;
                }

                $test_float = $this->generator->randomFloat($min, $max);
                $this->accessorTests($config, $property, $object, $test_float);
            } catch (GeneratorException $e) {
                throw new TestingToolsException('The Generator encountered an exception: ' . $e->getMessage());
            }
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $ints
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestInts(array $ints, object $object): void
    {
        $this->generator = new Generator();

        foreach ($ints as $property => $config) {
            try {
                if (
                    $config['config']['min'] ?? false &&
                    is_int($config['config']['min'])
                ) {
                    $min = $config['config']['min'];
                } else {
                    $min = null;
                }

                if (
                    $config['config']['max'] ?? false &&
                    is_int($config['config']['max'])
                ) {
                    $max = $config['config']['max'];
                } else {
                    $max = null;
                }

                $test_int = $this->generator->randomInteger($min, $max);
                $this->accessorTests($config, $property, $object, $test_int);
            } catch (GeneratorException $e) {
                throw new TestingToolsException('The Generator encountered an exception: ' . $e->getMessage());
            }
        }
    }

    /**
     * @param array $config
     * @param string $property
     * @param object $object
     * @param $test_value
     */
    private function accessorTests(array $config, string $property, object $object, $test_value)
    {
        $getter = $config['getter'];
        $setter = $config['setter'];

        $object->$setter($test_value);

        $this->assertEquals($test_value, $object->$getter(), 'There was a problem with the accessor for: ' . $property);

        $getter = $config['getter'];
        $setter = $config['setter'];

        $object->$setter($test_value);

        $this->assertEquals($test_value, $object->$getter(), 'There was a problem with the accessor for: ' . $property);
    }
}
