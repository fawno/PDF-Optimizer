<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dCompressPages {
		#[Option('-dCompressPages')]
		protected ?bool $dCompressPages = null;

		public function compressPages (?bool $dCompressPages) : self {
			$this->dCompressPages = $dCompressPages;

			return $this;
		}
	}
