<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dSubsetFonts {
		#[Option('-dSubsetFonts')]
		protected ?bool $dSubsetFonts = null;

		public function subsetFonts (?bool $dSubsetFonts) : self {
			$this->dSubsetFonts = $dSubsetFonts;

			return $this;
		}
	}
