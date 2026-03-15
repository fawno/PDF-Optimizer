<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dDownsampleMonoImages {
		#[Option('-dDownsampleMonoImages')]
		protected ?bool $dDownsampleMonoImages = null;

		public function downsampleMonoImages (?bool $dDownsampleMonoImages) : self {
			$this->dDownsampleMonoImages = $dDownsampleMonoImages;

			return $this;
		}
	}
