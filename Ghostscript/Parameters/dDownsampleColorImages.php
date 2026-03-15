<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dDownsampleColorImages {
		#[Option('-dDownsampleColorImages')]
		protected ?bool $dDownsampleColorImages = null;

		public function downsampleColorImages (?bool $dDownsampleColorImages) : self {
			$this->dDownsampleColorImages = $dDownsampleColorImages;

			return $this;
		}
	}
