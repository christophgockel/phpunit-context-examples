Simulate Contexts in PHPUnit
============================

Having the possibility to extract coherent groups of tests into separate test cases helps organizing a suite of tests.

## Background

As the number of tests for a particular CUT grows, you may realize that this fact hinders the overal readability of the test class.
Either the line count grows, or your `setUp()` becomes more and more a cluttered with arrangements and preparations to support all the different test methods.

Having the possibility to group specific tests together not only helps alleviate the constant growth of your current test class, it also helps you to create cleaner test classes.
Being able to group coherent test preparations and test executions allows smaller `setUp()` methods. And smaller methods is generally a good thing.

## Implementation

The shown examples test an artificial class `SomeComponent`. Unfortunately, testing `SomeComponent` requires calls and examinations with different - but contiguous - test data.
This contiguous test data can be centralized in different "contexts".

### Definition of `context`

Context isn't something necessarily needed for tests, but can help improve the readability and understandability of a give test class.
It encapsulates arrangements and examinations belonging to a specific group of tests.

For example [RSpec](http://rspec.info/) has the concept of nested `describe` and even `context` blocks.
As of today, PHPUnit doesn't support this concept directly. But there are ways to achieve similar results with the help of inheritance.

## Examples

TBD
