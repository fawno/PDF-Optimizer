<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dCompressFonts {
		#[Option('-dCompressFonts')]
		protected ?bool $dCompressFonts = null;

		public function compressFonts (?bool $dCompressFonts) : self {
			$this->dCompressFonts = $dCompressFonts;

			return $this;
		}
	}
