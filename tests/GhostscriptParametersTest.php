<?php
  declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests;

	use Fawno\Ghostscript\GhostscriptParameters;

	class GhostscriptParametersTest extends TestCase {
    public function testCreateParameters () : void {
      $params = GhostscriptParameters::create();

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertCount(8, $params);
			$this->assertContains('-dQUIET', $params);
			$this->assertContains('-dSAFER', $params);
			$this->assertContains('-dBATCH', $params);
			$this->assertContains('-dNOPAUSE', $params);
			$this->assertContains('-sDEVICE=pdfwrite', $params);
			$this->assertContains('-dPDFSETTINGS=/ebook', $params);
			$this->assertContains('-dCompatibilityLevel=1.4', $params);
			$this->assertContains('-dProcessColorModel=/DeviceRGB', $params);
    }
  }
