<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageFilterEnum;

	trait dGrayImageFilter {
		#[Option('-dGrayImageFilter')]
		protected ?dImageFilterEnum $dGrayImageFilter = null;

		public function grayImageFilter (?dImageFilterEnum $dGrayImageFilter) : self {
			$this->dGrayImageFilter = $dGrayImageFilter;

			return $this;
		}
	}
