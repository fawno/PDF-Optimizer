<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dEmbedAllFonts {
		#[Option('-dEmbedAllFonts')]
		protected ?bool $dEmbedAllFonts = null;

		public function embedAllFonts (?bool $dEmbedAllFonts) : self {
			$this->dEmbedAllFonts = $dEmbedAllFonts;

			return $this;
		}
	}
