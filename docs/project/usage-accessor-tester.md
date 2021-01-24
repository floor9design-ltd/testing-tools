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

// set up the config array for ints
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

$this->accessorTestInts($arrays, $object);

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

### accessorTestInts

```php

use Floor9design\TestingTools\Traits\AccessorTesterTrait;

// instantiate whatever object you wish to test:
$object = new stdClass();

// set up the config array for ints
$ints = [
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

$this->accessorTestInts($ints, $object);

```