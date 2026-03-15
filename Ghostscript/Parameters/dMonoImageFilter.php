<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dMonoImageFilterEnum;

	trait dMonoImageFilter {
		#[Option('-dMonoImageFilter')]
		protected ?dMonoImageFilterEnum $dMonoImageFilter = null;

		public function monoImageFilter (?dMonoImageFilterEnum $dMonoImageFilter) : self {
			$this->dMonoImageFilter = $dMonoImageFilter;

			return $this;
		}

	}
