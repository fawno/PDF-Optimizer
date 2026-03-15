<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dAutoFilterGrayImages {
		#[Option('-dAutoFilterGrayImages')]
		protected ?bool $dAutoFilterGrayImages = null;

		public function autoFilterGrayImages (?bool $dAutoFilterGrayImages) : self {
			$this->dAutoFilterGrayImages = $dAutoFilterGrayImages;

			return $this;
		}
	}
