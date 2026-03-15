<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageDownsampleTypeEnum;

	trait dMonoImageDownsampleType {
		#[Option('-dMonoImageDownsampleType')]
		protected ?dImageDownsampleTypeEnum $dMonoImageDownsampleType = null;

		public function monoImageDownsampleType (?dImageDownsampleTypeEnum $dMonoImageDownsampleType) : self {
			$this->dMonoImageDownsampleType = $dMonoImageDownsampleType;

			return $this;
		}
	}
