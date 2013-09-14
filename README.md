Simulate Contexts in PHPUnit
============================

Having the possibility to extract coherent groups of tests into separate test cases helps organizing a suite of tests.

## Disclaimer

The following approach of organizing tests with PHPUnit isn't meant to be the only way of test arrangements.
There are plenty of ways to achieve similar results, just by extracting test setups into helper methods and call these methods from you test class(es) for example.
Originally the examples shown here were meant as a sort of proof of concept.

Additionally it should be noted that the author is aware of all the problems that can arise, once you share state between tests.
It's important to note that (nested) contexts are meant to primarily support test preparations.

## Background

As the number of tests for a particular CUT grows, you may realize that this fact hinders the overal readability of the test class.
Either the line count grows, or your `setUp()` becomes more and more cluttered with arrangements and preparations to support all the different test methods.

Having the possibility to group specific tests together not only helps alleviate the constant growth of your current test class, it also helps you to create cleaner test classes.
Being able to group coherent test preparations and test executions allows smaller `setUp()` methods. And smaller methods is generally a good thing.

## Implementation

The shown examples test an artificial class `SomeComponent`. Unfortunately, testing `SomeComponent` requires calls and examinations with different - but contiguous - test data.
This contiguous test data can be centralized in different "contexts".

### Definition of "context"

Separate contexts isn't something necessarily needed for tests, but can help improve the readability and understandability of a given test class.
It encapsulates arrangements and examinations belonging to a specific group of tests.

For example [RSpec](http://rspec.info/) has the concept of nested `describe` and even `context` blocks.
As of today, PHPUnit doesn't support this concept directly. But there are ways to achieve similar results with the help of inheritance.
(PHP lacking the possibility of nested `class` definitions requires inheritance in this case.)

## Examples

The class `SomeComponent` is being test with three different groups of tests.
There's a "Variant Alpha", "Variant Beta" and "Variant Beta Gamma" to represent to different groups. "Variant Beta Gamma" is a sub-variant of "Variant Beta".

Executing the examples is done via command `phpunit` directly in the directory.
You should see the following output:

    PHPUnit 3.7.24 by Sebastian Bergmann.

    Configuration read from /Users/christoph/Development/phpunit-contexts/phpunit.xml


    Variant Alpha Context
    . Variant Alpha Setup
        Variant Alpha Test 1
      Variant Alpha Teardown
    . Variant Alpha Setup
        Variant Alpha Test 2
      Variant Alpha Teardown
    
    Variant Beta Context
    . Variant Beta Setup
        Variant Beta Test 1
      Variant Beta Teardown
    . Variant Beta Setup
        Variant Beta Test 2
      Variant Beta Teardown
    
    Variant Beta Context
      Variant Beta Gamma Context
    .   Variant Beta Gamma Setup
          Variant Beta Gamma Test 1
        Variant Beta Gamma Teardown
    .   Variant Beta Gamma Setup
          Variant Beta Gamma Test 2
        Variant Beta Gamma Teardown
    
    
    Time: 8 ms, Memory: 6.25Mb
    
    OK (6 tests, 0 assertions)

Not the most beautiful console output, but it'll do.

The actual test classes conform to the convention of having the filename ending with `*Test.php`. 
The classes inside these files however, do not inherit from `\PHPUnit_Framework_TestCase` as PHPUnit test classes normally do. 
They inherit from a context class, e.g. `SomeComponentVariantAlphaContext`. Which itself inherits from `\PHPUnit_Framework_TestCase`.
The context classes implements the method `setUpBeforeClass()` in order to make sure the context is intialized once per test class.
The test class itself can have a `setUp()` method to prepare arrangements needed for every test method.

One thing to note is that the context classes are required directly in the test class files. 
I don't have good solution or alternative for it yet though. This is something that should be sorted out in the future.
Using composer, one alternative could be to define a class-map for these contexts. But this adds more manual work needed for your project, as you would need to modifiy your `composer.json` everytime you create a new context.
Right now I think it's easier to just specifiy the required context right where it's needed - the source file of the test class.

## Footnotes

Having the test classes defined in a specific order in the configuration file `phpunit.xml` is done only for presentation purposes.
It helps having a better output on the console after runnung the tests.

Specifying an order for tests should be avoided in real world implementations.
