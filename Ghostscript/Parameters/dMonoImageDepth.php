<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageDepthEnum;

	trait dMonoImageDepth {
		#[Option('-dMonoImageDepth')]
		protected ?dImageDepthEnum $dMonoImageDepth = null;

		public function monoImageDepth (?dImageDepthEnum $dMonoImageDepth) : self {
			$this->dMonoImageDepth = $dMonoImageDepth;

			return $this;
		}
	}
