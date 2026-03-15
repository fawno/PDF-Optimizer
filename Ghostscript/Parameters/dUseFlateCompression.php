<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dUseFlateCompression {
		#[Option('-dUseFlateCompression')]
		protected ?bool $dUseFlateCompression = null;

		public function useFlateCompression (?bool $dUseFlateCompression) : self {
			$this->dUseFlateCompression = $dUseFlateCompression;

			return $this;
		}
	}
