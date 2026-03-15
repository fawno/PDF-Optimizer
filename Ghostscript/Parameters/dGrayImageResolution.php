<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dGrayImageResolution {
		#[Option('-dGrayImageResolution')]
		protected ?int $dGrayImageResolution = null;

		public function grayImageResolution (?int $dGrayImageResolution) : self {
			$this->dGrayImageResolution = $dGrayImageResolution;

			return $this;
		}
	}
