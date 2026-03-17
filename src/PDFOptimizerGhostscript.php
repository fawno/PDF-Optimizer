<?php
	declare(strict_types=1);

	namespace Fawno\PDFOptimizer;

	use Fawno\Ghostscript\Ghostscript;
	use Fawno\Ghostscript\GhostscriptAPI;
	use Fawno\Ghostscript\GhostscriptParameters;
	use Fawno\Ghostscript\GhostscriptReturnCodes;

	class PDFOptimizerGhostscript {
		private function __construct (protected Ghostscript|GhostscriptAPI $gs) {}

		public static function create (Ghostscript|GhostscriptAPI $gs) : PDFOptimizerGhostscript {
			return new self($gs);
		}

		public function optimize (?string $original, ?string $optimized, GhostscriptParameters $arguments, ?string &$stdout, ?string &$stderr) : GhostscriptReturnCodes {
			if ($this->gs instanceof Ghostscript) {
				$original = $original ? '"' . $original . '"' : null;
				$optimized = $optimized ? '"' . $optimized . '"' : null;
			}

			return $this->gs->run($arguments->getParameters($original, $optimized), $stdout, $stderr);
		}
	}
