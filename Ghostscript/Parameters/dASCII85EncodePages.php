<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dASCII85EncodePages {
		#[Option('-dASCII85EncodePages')]
		protected ?bool $dASCII85EncodePages = null;

		public function ASCII85EncodePages (?bool $dASCII85EncodePages) : self {
			$this->dASCII85EncodePages = $dASCII85EncodePages;

			return $this;
		}
	}
