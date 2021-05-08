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

use Exception;
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
                ($config['config']['length'] ?? false) &&
                is_int($config['config']['length'])
            ) {
                $length = $config['config']['length'];
            } else {
                $length = null;
            }

            if (
                ($config['config']['array_length'] ?? false) &&
                is_int($config['config']['array_length'])
            ) {
                $array_length = $config['config']['array_length'];
            } else {
                $array_length = null;
            }

            $test_array = $this->generator->randomStringArray($length, $array_length);
            $this->accessorTests($property, $config, $object, $test_array);
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
    public function accessorTestBooleans(array $booleans, object $object): void
    {
        $this->generator = new Generator();

        foreach ($booleans as $property => $config) {
            $test_boolean = $this->generator->randomBoolean();
            $this->accessorTests($property, $config, $object, $test_boolean);
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
                    ($config['config']['min'] ?? false) &&
                    (is_float($config['config']['min']) || is_int($config['config']['min']))
                ) {
                    $min = $config['config']['min'];
                } else {
                    $min = null;
                }

                if (
                    ($config['config']['max'] ?? false) &&
                    (is_float($config['config']['max']) || is_int($config['config']['max']))
                ) {
                    $max = $config['config']['max'];
                } else {
                    $max = null;
                }

                $test_float = $this->generator->randomFloat($min, $max);
                $this->accessorTests($property, $config, $object, $test_float);
            } catch (GeneratorException $e) {
                throw new TestingToolsException('The Generator encountered an exception: ' . $e->getMessage());
            }
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $integers
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestIntegers(array $integers, object $object): void
    {
        $this->generator = new Generator();

        foreach ($integers as $property => $config) {
            try {
                if (
                    ($config['config']['min'] ?? false) &&
                    is_int($config['config']['min'])
                ) {
                    $min = $config['config']['min'];
                } else {
                    $min = null;
                }

                if (
                    ($config['config']['max'] ?? false) &&
                    is_int($config['config']['max'])
                ) {
                    $max = $config['config']['max'];
                } else {
                    $max = null;
                }

                $test_int = $this->generator->randomInteger($min, $max);
                $this->accessorTests($property, $config, $object, $test_int);
            } catch (GeneratorException $e) {
                throw new TestingToolsException('The Generator encountered an exception: ' . $e->getMessage());
            }
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $strings
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestStrings(array $strings, object $object): void
    {
        $this->generator = new Generator();

        foreach ($strings as $property => $config) {
            try {
                if (
                    ($config['config']['length'] ?? false) &&
                    is_int($config['config']['length'])
                ) {
                    if ($config['config']['length'] < 0) {
                        throw new TestingToolsException("The length specified cannot be less than 0");
                    }

                    $length = $config['config']['length'];
                } else {
                    $length = null;
                }

                $test_float = $this->generator->randomString($length);
                $this->accessorTests($property, $config, $object, $test_float);
            } catch (Exception $e) {
                throw new TestingToolsException('The Generator encountered an exception: ' . $e->getMessage());
            }
        }
    }

    // Special cases of the above:

    /**
     * Tests an array of accessors
     *
     * @param array $floats
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestCurrencies(array $currencies, object $object): void
    {
        $this->generator = new Generator();

        foreach ($currencies as $property => $config) {
            try {
                if (
                    ($config['config']['min'] ?? false) &&
                    (is_float($config['config']['min']) || is_int($config['config']['min']))
                ) {
                    $min = $config['config']['min'];
                } else {
                    $min = null;
                }

                if (
                    ($config['config']['max'] ?? false) &&
                    (is_float($config['config']['max']) || is_int($config['config']['max']))
                ) {
                    $max = $config['config']['max'];
                } else {
                    $max = null;
                }

                if (
                    ($config['config']['decimal_places'] ?? false) &&
                    is_int($config['config']['decimal_places'])
                ) {
                    if ($config['config']['decimal_places'] < 0) {
                        throw new TestingToolsException("The length specified cannot be less than 0");
                    }

                    $decimal_places = $config['config']['decimal_places'];
                } else {
                    $decimal_places = null;
                }

                $test_float = $this->generator->randomCurrency($min, $max, $decimal_places);
                $this->accessorTests($property, $config, $object, $test_float);
            } catch (GeneratorException $e) {
                throw new TestingToolsException('The Generator encountered an exception: ' . $e->getMessage());
            }
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $dates
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestDates(array $dates, object $object): void
    {
        $this->generator = new Generator();

        foreach ($dates as $property => $config) {
            $test_date = $this->generator->randomMySqlDate();
            $this->accessorTests($property, $config, $object, $test_date);
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $datetimes
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestDateTimes(array $datetimes, object $object): void
    {
        $this->generator = new Generator();

        foreach ($datetimes as $property => $config) {
            $test_date_time = $this->generator->randomMySqlDate();
            $this->accessorTests($property, $config, $object, $test_date_time);
        }
    }

    /**
     * Tests an array of accessors
     *
     * @param array $jsons
     * @param object $object
     * @return void
     * @throws TestingToolsException
     */
    public function accessorTestJsons(array $jsons, object $object): void
    {
        $this->generator = new Generator();

        foreach ($jsons as $property => $config) {
            try {
                if (
                    $config['config']['number_of_arrays'] ?? false &&
                    is_int($config['config']['number_of_arrays'])
                ) {
                    if ($config['config']['number_of_arrays'] < 0) {
                        throw new TestingToolsException("The number of arrays specified cannot be less than 0");
                    }

                    $number_of_arrays = $config['config']['number_of_arrays'];
                } else {
                    $number_of_arrays = null;
                }

                if (
                    $config['config']['number_of_booleans'] ?? false &&
                    is_int($config['config']['number_of_booleans'])
                ) {
                    if ($config['config']['number_of_booleans'] < 0) {
                        throw new TestingToolsException("The number of booleans specified cannot be less than 0");
                    }

                    $number_of_booleans = $config['config']['number_of_booleans'];
                } else {
                    $number_of_booleans = null;
                }

                if (
                    $config['config']['number_of_floats'] ?? false &&
                    is_int($config['config']['number_of_floats'])
                ) {
                    if ($config['config']['number_of_floats'] < 0) {
                        throw new TestingToolsException("The number of floats specified cannot be less than 0");
                    }

                    $number_of_floats = $config['config']['number_of_floats'];
                } else {
                    $number_of_floats = null;
                }

                if (
                    $config['config']['number_of_integers'] ?? false &&
                    is_int($config['config']['number_of_integers'])
                ) {
                    if ($config['config']['number_of_integers'] < 0) {
                        throw new TestingToolsException("The number of integers specified cannot be less than 0");
                    }

                    $number_of_integers = $config['config']['number_of_integers'];
                } else {
                    $number_of_integers = null;
                }

                if (
                    $config['config']['number_of_strings'] ?? false &&
                    is_int($config['config']['number_of_strings'])
                ) {
                    if ($config['config']['number_of_strings'] < 0) {
                        throw new TestingToolsException("The number of strings specified cannot be less than 0");
                    }

                    $number_of_strings = $config['config']['number_of_strings'];
                } else {
                    $number_of_strings = null;
                }

                $test_json = $this->generator->randomJson(
                    $number_of_arrays,
                    $number_of_booleans,
                    $number_of_floats,
                    $number_of_integers,
                    $number_of_strings
                );

                $this->accessorTests($property, $config, $object, $test_json);
            } catch (Exception $e) {
                throw new TestingToolsException($e->getMessage());
            }
        }
    }

    // private functions

    /**
     * @param string $property
     * @param array $config
     * @param object $object
     * @param $test_value
     */
    private function accessorTests(string $property, array $config, object $object, $test_value)
    {
        $getter = $config['getter'] ?? $this->guessGetter($property);
        $setter = $config['setter'] ?? $this->guessSetter($property);

        $object->$setter($test_value);

        $this->assertEquals($test_value, $object->$getter(), 'There was a problem with the accessor for: ' . $property);
    }

    /**
     * Attempts to convert a string to a get method
     *
     * @param string $name
     * @return string
     */
    private function guessGetter(string $name): string
    {
        return 'get' . $this->methodCaseConverter($name);
    }

    /**
     * Attempts to convert a string to a set method
     *
     * @param string $name
     * @return string
     */
    private function guessSetter(string $name): string
    {
        return 'set' . $this->methodCaseConverter($name);
    }

    /**
     * Converts to an unspecified method in PRS-12 compliant naming standards eg:
     * e.g: foo => Foo, foo_bar => FooBar
     *
     * @param string $name
     * @return string
     */
    private function methodCaseConverter(string $name): string
    {
        $string = str_replace(
        // remove spaces
            ' ',
            '',
            ucwords(
            // convert into a "string with spaces"
                str_replace('_', ' ', $name)
            )
        );

        return $string;
    }

}
