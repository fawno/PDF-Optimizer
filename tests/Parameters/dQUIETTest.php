<?php
	declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests\Parameters;

	use Fawno\Ghostscript\GhostscriptParameters;
	use Fawno\Ghostscript\Parameters\dQUIET;

	class dQUIETTest extends TestParameterCase {
		public function testdQUIETTrait () : void {
			$this->assertIsTrait(dQUIET::class);
			$this->assertClassHasProperty(dQUIET::class, 'dQUIET');
			$this->assertClassPropertyIsType(dQUIET::class, 'dQUIET', 'bool');
		}

		public function testdQUIETDefault () : void {
      $params = GhostscriptParameters::create();

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertContains('-dQUIET', $params);
    }

		public function testdQUIETTrue () : void {
      $params = GhostscriptParameters::create()->quiet(true);

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertContains('-dQUIET', $params);
    }

		public function testdQUIETFalse () : void {
      $params = GhostscriptParameters::create()->quiet(false);

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertNotContains('-dQUIET', $params);
    }
  }
