<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dMaxSubsetPct {
		#[Option('-dMaxSubsetPct')]
		protected ?int $dMaxSubsetPct = null;

		public function maxSubsetPct (?int $dMaxSubsetPct) : self {
			$this->dMaxSubsetPct = $dMaxSubsetPct;

			return $this;
		}
	}
