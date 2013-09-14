<?php
require_once 'SomeComponentVariantBetaContext.php';

class SomeComponentVariantBetaTest extends SomeComponentVariantBetaContext
{
  public function setUp() {
    echo " Variant Beta Setup\n";
  }

  public function tearDown() {
    echo "  Variant Beta Teardown\n";
  }

  public function testSomething() {
    echo "    Variant Beta Test 1\n";
  }

  public function testAnotherThing() {
    echo "    Variant Beta Test 2\n";
  }
}
