<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dColorImageDownsampleThreshold {
		#[Option('-dColorImageDownsampleThreshold')]
		protected ?float $dColorImageDownsampleThreshold = null;

		public function colorImageDownsampleThreshold (?float $dColorImageDownsampleThreshold) : self {
			$this->dColorImageDownsampleThreshold = $dColorImageDownsampleThreshold;

			return $this;
		}
	}
