<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dMonoImageResolution {
		#[Option('-dMonoImageResolution')]
		protected ?int $dMonoImageResolution = null;

		public function monoImageResolution (?int $dMonoImageResolution) : self {
			$this->dMonoImageResolution = $dMonoImageResolution;

			return $this;
		}
	}
