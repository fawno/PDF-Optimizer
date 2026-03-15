<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPreserveEPSInfo {
		#[Option('-dPreserveEPSInfo')]
		protected ?bool $dPreserveEPSInfo = null;

		public function preserveEPSInfo (?bool $dPreserveEPSInfo) : self {
			$this->dPreserveEPSInfo = $dPreserveEPSInfo;

			return $this;
		}
	}
