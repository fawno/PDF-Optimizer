<?php
  declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests;

	use Fawno\Ghostscript\GhostscriptParameters;

	class GhostscriptParametersTest extends TestCase {
    public function testDefaultParameters () : void {
      $params = GhostscriptParameters::create();

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertEquals([
    		'-dQUIET',
    		'-dSAFER',
    		'-dBATCH',
    		'-dNOPAUSE',
    		'-sDEVICE=pdfwrite',
    		'-dPDFSETTINGS=/ebook',
    		'-dCompatibilityLevel=1.4',
    		'-dProcessColorModel=/DeviceRGB',
			], $params);
    }
  }
