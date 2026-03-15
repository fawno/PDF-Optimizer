<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dAutoFilterColorImages {
		#[Option('-dAutoFilterColorImages')]
		protected ?bool $dAutoFilterColorImages = null;

		public function autoFilterColorImages (?bool $dAutoFilterColorImages) : self {
			$this->dAutoFilterColorImages = $dAutoFilterColorImages;

			return $this;
		}
	}
