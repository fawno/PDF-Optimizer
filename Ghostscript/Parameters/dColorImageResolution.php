<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dColorImageResolution {
		#[Option('-dColorImageResolution')]
		protected ?int $dColorImageResolution = null;

		public function colorImageResolution (?int $dColorImageResolution) : self {
			$this->dColorImageResolution = $dColorImageResolution;

			return $this;
		}
	}
