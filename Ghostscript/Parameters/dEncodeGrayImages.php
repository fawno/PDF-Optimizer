<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dEncodeGrayImages {
		#[Option('-dEncodeGrayImages')]
		protected ?bool $dEncodeGrayImages = null;

		public function encodeGrayImages (?bool $dEncodeGrayImages) : self {
			$this->dEncodeGrayImages = $dEncodeGrayImages;

			return $this;
		}
	}
