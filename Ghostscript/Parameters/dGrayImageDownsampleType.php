<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageDownsampleTypeEnum;

	trait dGrayImageDownsampleType {
		#[Option('-dGrayImageDownsampleType')]
		protected ?dImageDownsampleTypeEnum $dGrayImageDownsampleType = null;

		public function grayImageDownsampleType (?dImageDownsampleTypeEnum $dGrayImageDownsampleType) : self {
			$this->dGrayImageDownsampleType = $dGrayImageDownsampleType;

			return $this;
		}
	}
