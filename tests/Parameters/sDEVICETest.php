<?php
	declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests\Parameters;

	use Fawno\Ghostscript\GhostscriptParameters;
	use Fawno\Ghostscript\Parameters\Enums\sDEVICEEnum;
	use Fawno\Ghostscript\Parameters\sDEVICE;

	class sDEVICETest extends TestParameterCase {
		public function testsDEVICETrait () : void {
			$this->assertIsTrait(sDEVICE::class);
			$this->assertClassHasProperty(sDEVICE::class, 'sDEVICE');
			$this->assertClassPropertyIsType(sDEVICE::class, 'sDEVICE', [sDEVICEEnum::class, 'null']);
		}

		public function testsDEVICEDefault () : void {
      $params = GhostscriptParameters::create();

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertContains('-sDEVICE=' . sDEVICEEnum::PDFWRITE->value, $params);
    }

		public function testsDEVICENull () : void {
      $params = GhostscriptParameters::create()->device(null);

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertNotContains('-sDEVICE=' . sDEVICEEnum::PDFWRITE->value, $params);
    }

		public function testsDEVICEJPEG () : void {
      $params = GhostscriptParameters::create()->device(sDEVICEEnum::JPEG);

			$this->assertInstanceOf(GhostscriptParameters::class, $params);

			$params = $params->getParameters();
			$this->assertIsArray($params);
			$this->assertContains('-sDEVICE=' . sDEVICEEnum::JPEG->value, $params);
    }
  }
