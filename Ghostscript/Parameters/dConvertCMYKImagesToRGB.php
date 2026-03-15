<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dConvertCMYKImagesToRGB {
		#[Option('-dConvertCMYKImagesToRGB')]
		protected ?bool $dConvertCMYKImagesToRGB = null;

		public function convertCMYKImagesToRGB (?bool $dConvertCMYKImagesToRGB) : self {
			$this->dConvertCMYKImagesToRGB = $dConvertCMYKImagesToRGB;

			return $this;
		}
	}
