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
The class will attempt to guess the accessors, and set config automatically.

The following is a perfectly valid config array (and is the intended general use case):

```php
$config = [
    'foo' => [],
    'bar' => [],
    // ...
];
```

These arrays follow the pattern:

```php
$config = [
    // the name of the property being checked
    'foo' => [
        // name of the getter (optional)
        'getter' => 'getFoo',
        // name of the setter (optional)
        'setter' => 'setFoo',
        // further config (optional, and dependant on the type of accessor/method required)
        'config' => []
    ]
];
```

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

### accessorTestDates

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for floats
$dates = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // change the output of the date
        'config' => ['format' => 'Y']
    ]
];

$this->accessorTestBooleans($dates, $object);

```

### accessorTestDateTimes

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for floats
$datetimes = [
    // the property
    'foo' => [
        // name of the getter
        'getter' => 'getFoo',
        // name of the setter
        'setter' => 'setFoo',
        // change the output of the date
        'config' => ['format' => 'Y']
    ]
];

$this->accessorTestBooleans($datetimes, $object);

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
$strings = [
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

$this->accessorTestStrings($strings, $object);

```

## Easy Use Example:

The following example shows the ease with which multiple accessors can be checked in a few lines of code.

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// Arrays
$arrays = ['foo' => [], 'bar' => []];
$this->accessorTestArrays($arrays, $object);

// Ints, including an irregular test
$ints = ['fizz' => [],    'bang' => ['getter' => 'getMegaBang', 'setter' => 'setUltraBang']];
$this->accessorTestInts($ints, $object);

// ..etc

```