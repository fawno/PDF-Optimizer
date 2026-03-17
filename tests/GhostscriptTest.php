<?php
	declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests;

	use Fawno\Ghostscript\Ghostscript;

	class GhostscriptTest extends TestCase {
		public const GSBIN_PATH_LINUX = '/usr/bin/gs';
		public const GSBIN_PATH_WINDOWS = '\\usr\\gs\\bin\\gswin64c.exe';
		readonly public string $gsbin_path;

		protected function setUp(): void {
			$this->gsbin_path = (PHP_OS == 'Linux') ? self::GSBIN_PATH_LINUX : self::GSBIN_PATH_WINDOWS;

			if (!is_file($this->gsbin_path)) {
				$this->markTestSkipped('Not found GSBIN: ' . $this->gsbin_path);
			}
		}

    public function testGhostscriptLoad () : void {
			$gs = Ghostscript::create($this->gsbin_path);

			$this->assertInstanceOf(Ghostscript::class, $gs);
    }
	}
