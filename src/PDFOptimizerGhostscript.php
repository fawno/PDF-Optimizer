<?php
  declare(strict_types=1);

	namespace Fawno\PDFOptimizer;

	use Fawno\Ghostscript\Ghostscript;
	use Fawno\Ghostscript\GhostscriptAPI;
	use Fawno\Ghostscript\Type\GSAPIParameter;
	use Fawno\Ghostscript\Type\GSAPIParameters;

	class PDFOptimizerGhostscript {
		private function __construct (protected Ghostscript|GhostscriptAPI $gs) {}

		public static function create (Ghostscript|GhostscriptAPI $gs) : PDFOptimizerGhostscript {
			return new self($gs);
		}

		public function optimize (string $original, string $optimized, GSAPIParameters $arguments, ?string &$stdout, ?string &$stderr) : int {
			if ($this->gs instanceof Ghostscript) {
				$original = '"' . $original . '"';
				$optimized = '"' . $optimized . '"';
			}

			$arguments = $arguments->copy();
			$arguments->append(
				GSAPIParameter::create('sOutputFile', $optimized),
				GSAPIParameter::create('', $original),
			);

			return $this->gs->run($arguments, $stdout, $stderr);
			return 0;
		}
	}
