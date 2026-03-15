<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPDFX {
		#[Option('-dPDFX')]
		protected ?bool $dPDFX = null;

		public function PDFX (?bool $dPDFX) : self {
			$this->dPDFX = $dPDFX;

			return $this;
		}
	}
