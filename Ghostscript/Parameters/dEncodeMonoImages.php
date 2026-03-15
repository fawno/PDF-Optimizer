<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dEncodeMonoImages {
		#[Option('-dEncodeMonoImages')]
		protected ?bool $dEncodeMonoImages = null;

		public function encodeMonoImages (?bool $dEncodeMonoImages) : self {
			$this->dEncodeMonoImages = $dEncodeMonoImages;

			return $this;
		}
	}
