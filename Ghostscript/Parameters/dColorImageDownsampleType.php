<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageDownsampleTypeEnum;

	trait dColorImageDownsampleType {
		#[Option('-dColorImageDownsampleType')]
		protected ?dImageDownsampleTypeEnum $dColorImageDownsampleType = null;

		public function colorImageDownsampleType (?dImageDownsampleTypeEnum $dColorImageDownsampleType) : self {
			$this->dColorImageDownsampleType = $dColorImageDownsampleType;

			return $this;
		}
	}
