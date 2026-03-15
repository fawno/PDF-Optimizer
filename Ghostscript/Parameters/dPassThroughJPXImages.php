<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPassThroughJPXImages {
		#[Option('-dPassThroughJPXImages')]
		protected ?bool $dPassThroughJPXImages = null;

		public function passThroughJPXImages (?bool $dPassThroughJPXImages) : self {
			$this->dPassThroughJPXImages = $dPassThroughJPXImages;

			return $this;
		}
	}
