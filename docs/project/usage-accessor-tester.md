# AccessorTester

This class offers a quick way to auto test your accessors.

## Usage

Firstly, `use` the class to include its methods:

```php
use Floor9design\TestingTools\Traits\AccessorTesterTrait;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    use AccessorTesterTrait;
}
```

From here the various methods can be called. They require an array with the accessor details/config and the object.
The details of each method are listed below:

## Methods

### accessorTestArrays

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for arrays
$arrays = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // further config (optional) - maps directly to Floor9design\TestDataGenerator\Generator::randomStringArray()
        'config' => [
             // string length value
            'length' => 5, 
            // array length
            'array_length' => 10
        ]
    ]
];

$this->accessorTestArrays($arrays, $object);

```

### accessorTestBooleans

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for floats
$booleans = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
    ]
];

$this->accessorTestBooleans($booleans, $object);

```

### accessorTestFloats

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for floats
$floats = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // further config (optional) - maps directly to Floor9design\TestDataGenerator\Generator::randomFloat()
        'config' => [
             // min float value
            'min' => 5.2, 
            // max int value
            'max' => 10.4
        ]
    ]
];

$this->accessorTestFloats($floats, $object);

```

### accessorTestIntegers

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for integers
$integers = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // further config (optional) - maps directly to Floor9design\TestDataGenerator\Generator::randomInt()
        'config' => [
             // min int value
            'min' => 5, 
            // max int value
            'max' => 10
        ]
    ]
];

$this->accessorTestIntegers($integers, $object);

```

### accessorTestJsons

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for json objects
$jsons = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // further config (optional) - maps directly to Floor9design\TestDataGenerator\Generator::randomJson()
        'config' => [
             // number of arrays included in the json
            'number_of_arrays' => 5, 
            // number of arrays included in the json
            'number_of_booleans' => 10,
            // number of booleans included in the json
            'number_of_floats' => 10,
            // number of floats included in the json
            'number_of_integers' => 10,
            // number of integers included in the json
            'number_of_strings' => 10,
        ]
    ]
];

$this->accessorTestJsons($jsons, $object);

```

### accessorTestStrings

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for strings
$integers = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // further config (optional) - maps directly to Floor9design\TestDataGenerator\Generator::randomString()
        'config' => [
             // string length
            'length' => 10
        ]
    ]
];

$this->accessorTestStrings($integers, $object);

```

## Easy Use Example:

The following example shows the ease with which multiple accessors can be checked in a few lines of code.

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

$arrays = [
    'foo' => ['getter' => 'getFoo', 'setter' => 'setFoo'],
    'bar' => ['getter' => 'getBar', 'setter' => 'setBar']
];
$this->accessorTestArrays($arrays, $object);

$ints = [
    'fizz' => ['getter' => 'getFizz', 'setter' => 'setFizz'],
    'bang' => ['getter' => 'getBang', 'setter' => 'setBang']
];
$this->accessorTestInts($ints, $object);

// ..etc

```