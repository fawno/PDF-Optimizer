<?php
  declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests;

	class GhostscriptPathFinderTest extends TestCase {
    public function testGhostscriptBinary () : void {
			$file = (PHP_OS == 'Linux') ? '/usr/bin/gs' : '\\usr\\gs\\bin\\gswin64c.exe';

			if (!is_file($file)) {
				$this->markTestSkipped($file);
			}

			$this->assertFileExists($file);
    }

		public function testGhostscriptLibrary () : void {
      $file = (PHP_OS == 'Linux') ? '/usr/lib/x86_64-linux-gnu/libgs.so' : '\\usr\\gs\\bin\\gsdll64.dll';

			if (!is_file($file)) {
				$this->markTestSkipped($file);
			}

			$this->assertFileExists($file);
    }
	}
