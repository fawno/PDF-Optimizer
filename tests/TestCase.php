<?php
  declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests;

  use PHPUnit\Framework\TestCase as PHPUnitTestCase;

	class TestCase extends PHPUnitTestCase {
    public function out (string $message) : void {
      fwrite(STDOUT, $message . PHP_EOL);
    }
	}
