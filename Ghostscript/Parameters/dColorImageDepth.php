<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageDepthEnum;

	trait dColorImageDepth {
		#[Option('-dColorImageDepth')]
		protected ?dImageDepthEnum $dColorImageDepth = null;

		public function colorImageDepth (?dImageDepthEnum $dColorImageDepth) : self {
			$this->dColorImageDepth = $dColorImageDepth;

			return $this;
		}
	}
