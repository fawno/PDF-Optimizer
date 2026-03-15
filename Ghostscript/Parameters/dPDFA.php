<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dPDFAEnum;

	trait dPDFA {
		#[Option('-dPDFA')]
		protected ?dPDFAEnum $dPDFA = null;

		/**
		 * PDFA
		 *
		 * Specify the PDF/A-1, PDF/A-2 or PDF/A-3.
		 *
		 * @param null|dPDFAEnum $dPDFA
		 * @return GhostscriptParameters
		 */
		public function PDFA (?dPDFAEnum $dPDFA) : self {
			$this->dPDFA = $dPDFA;

			return $this;
		}
	}
