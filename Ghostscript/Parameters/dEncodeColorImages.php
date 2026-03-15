<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dEncodeColorImages {
		#[Option('-dEncodeColorImages')]
		protected ?bool $dEncodeColorImages = null;

		public function encodeColorImages (?bool $dEncodeColorImages) : self {
			$this->dEncodeColorImages = $dEncodeColorImages;

			return $this;
		}
	}
