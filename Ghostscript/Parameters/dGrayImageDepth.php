<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dImageDepthEnum;

	trait dGrayImageDepth {
		#[Option('-dGrayImageDepth')]
		protected ?dImageDepthEnum $dGrayImageDepth = null;

		public function grayImageDepth (?dImageDepthEnum $dGrayImageDepth) : self {
			$this->dGrayImageDepth = $dGrayImageDepth;

			return $this;
		}
	}
