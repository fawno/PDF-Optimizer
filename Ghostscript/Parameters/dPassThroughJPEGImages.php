<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPassThroughJPEGImages {
		#[Option('-dPassThroughJPEGImages')]
		protected ?bool $dPassThroughJPEGImages = null;

		public function passThroughJPEGImages (?bool $dPassThroughJPEGImages) : self {
			$this->dPassThroughJPEGImages = $dPassThroughJPEGImages;

			return $this;
		}
	}
