<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPreserveOverprintSettings {
		#[Option('-dPreserveOverprintSettings')]
		protected ?bool $dPreserveOverprintSettings = null;

		public function preserveOverprintSettings (?bool $dPreserveOverprintSettings) : self {
			$this->dPreserveOverprintSettings = $dPreserveOverprintSettings;

			return $this;
		}
	}
