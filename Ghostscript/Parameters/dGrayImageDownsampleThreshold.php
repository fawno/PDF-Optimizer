<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dGrayImageDownsampleThreshold {
		#[Option('-dGrayImageDownsampleThreshold')]
		protected ?float $dGrayImageDownsampleThreshold = null;

		public function grayImageDownsampleThreshold (?float $dGrayImageDownsampleThreshold) : self {
			$this->dGrayImageDownsampleThreshold = $dGrayImageDownsampleThreshold;

			return $this;
		}
	}
