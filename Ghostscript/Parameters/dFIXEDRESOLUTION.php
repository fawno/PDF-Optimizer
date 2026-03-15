<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dFIXEDRESOLUTION {
		#[Option('-dFIXEDRESOLUTION')]
		protected ?int $dFIXEDRESOLUTION = null;

		public function fixedResolution (?int $dFIXEDRESOLUTION) : self {
			$this->dFIXEDRESOLUTION = $dFIXEDRESOLUTION;

			return $this;
		}
	}
