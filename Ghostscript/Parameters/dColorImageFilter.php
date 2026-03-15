<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageFilterEnum;

	trait dColorImageFilter {
		#[Option('-dColorImageFilter')]
		protected ?dImageFilterEnum $dColorImageFilter = null;

		public function colorImageFilter (?dImageFilterEnum $dColorImageFilter) : self {
			$this->dColorImageFilter = $dColorImageFilter;

			return $this;
		}
	}
