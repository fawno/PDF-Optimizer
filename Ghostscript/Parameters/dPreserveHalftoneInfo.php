<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPreserveHalftoneInfo {
		#[Option('-dPreserveHalftoneInfo')]
		protected ?bool $dPreserveHalftoneInfo = null;

		public function preserveHalftoneInfo (?bool $dPreserveHalftoneInfo) : self {
			$this->dPreserveHalftoneInfo = $dPreserveHalftoneInfo;

			return $this;
		}
	}
