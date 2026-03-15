<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dMonoImageDownsampleThreshold {
		#[Option('-dMonoImageDownsampleThreshold')]
		protected ?float $dMonoImageDownsampleThreshold = null;

		public function monoImageDownsampleThreshold (?float $dMonoImageDownsampleThreshold) : self {
			$this->dMonoImageDownsampleThreshold = $dMonoImageDownsampleThreshold;

			return $this;
		}
	}
