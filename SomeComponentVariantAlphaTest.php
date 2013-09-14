<?php
require_once 'SomeComponentVariantAlphaContext.php';

class SomeComponentVariantAlphaTest extends SomeComponentVariantAlphaContext
{
  public function setUp() {
    echo " Variant Alpha Setup\n";
  }

  public function tearDown() {
    echo "  Variant Alpha Teardown\n";
  }

  public function testSomething() {
    echo "    Variant Alpha Test 1\n";
  }

  public function testAnotherThing() {
    echo "    Variant Alpha Test 2\n";
  }
}
