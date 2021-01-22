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

            } catch (GeneratorException $e) {
                throw new TestingToolsException('The Generator encountered and exception: ' . $e->getMessage());
            }

            $getter = $config['getter'];
            $setter = $config['setter'];

            $object->$setter($test_int);

            $this->assertEquals($test_int, $object->$getter(), 'There was a problem with the accessor for: ' . $property);

            $getter = $config['getter'];
            $setter = $config['setter'];

            $object->$setter($test_int);

            $this->assertEquals($test_int, $object->$getter(), 'There was a problem with the accessor for: ' . $property);
        }
    }

}
