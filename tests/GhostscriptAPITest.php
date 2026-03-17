<?php
	declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests;

	use Fawno\Ghostscript\GhostscriptAPI;
	use PHPUnit\Framework\Attributes\RequiresPhpExtension;;

	#[RequiresPhpExtension('ffi')]
	class GhostscriptAPITest extends TestCase {
		public const GSLIB_PATH_LINUX = '/usr/lib/x86_64-linux-gnu/libgs.so';
		public const GSLIB_PATH_WINDOWS = '\\usr\\gs\\bin\\gsdll64.dll';
		readonly public string $gslib_path;

		protected function setUp(): void {
			$this->gslib_path = (PHP_OS == 'Linux') ? self::GSLIB_PATH_LINUX : self::GSLIB_PATH_WINDOWS;

			if (!is_file($this->gslib_path)) {
				$this->markTestSkipped('Not found GSLIB: ' . $this->gslib_path);
			}
		}

    public function testGhostscriptAPILoad () : void {
			$gs = GhostscriptAPI::create($this->gslib_path);

			$this->assertInstanceOf(GhostscriptAPI::class, $gs);
    }
	}
