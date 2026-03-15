<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dDownsampleGrayImages {
		#[Option('-dDownsampleGrayImages')]
		protected ?bool $dDownsampleGrayImages = null;

		public function downsampleGrayImages (?bool $dDownsampleGrayImages) : self {
			$this->dDownsampleGrayImages = $dDownsampleGrayImages;

			return $this;
		}
	}
