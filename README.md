PHP Dynamic Methods
===================

> Generate custom class methods with simple API based on the [Mecha CMS](https://github.com/mecha-cms) class methods generator.

Usage
-----

~~~ .php
require 'p-h-p-dynamic-methods.php';

class MyClass extends PHPDynamicMethods {
    public function test() {
        echo 'Test native method!';
    }
    public static function testStatic() {
        echo 'Test native static method!';
    }
}


$my_class = new MyClass();
$my_class->test(); // Test native method!

MyClass::testStatic(); // Test native static method!
~~~

Adding custom methods:

~~~ .php
MyClass::fn('test2', function($value) {
    echo 'Test dynamic method with value: ' . $value . '!';
    var_dump($this);
});

MyClass::fn('test2Static', function($value) {
    echo 'Test dynamic static method with value: ' . $value . '!';
});

$my_class->test2(100); // Test dynamic method with value: 100!
MyClass::test2Static(100); // Test dynamic static method with value: 100!
~~~