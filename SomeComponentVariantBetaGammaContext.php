<?php
require_once 'SomeComponentVariantBetaContext.php';

class SomeComponentVariantBetaGammaContext extends SomeComponentVariantBetaContext
{
  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    echo "  Variant Beta Gamma Context\n";
  }
}
