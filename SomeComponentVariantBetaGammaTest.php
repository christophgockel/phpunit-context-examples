<?php
require_once 'SomeComponentVariantBetaGammaContext.php';

class SomeComponentVariantBetaGammaTest extends SomeComponentVariantBetaGammaContext
{
  public function setUp() {
    echo "   Variant Beta Gamma Setup\n";
  }

  public function tearDown() {
    echo "    Variant Beta Gamma Teardown\n";
  }

  public function testSomething() {
    echo "      Variant Beta Gamma Test 1\n";
  }

  public function testAnotherThing() {
    echo "      Variant Beta Gamma Test 2\n";
  }
}
