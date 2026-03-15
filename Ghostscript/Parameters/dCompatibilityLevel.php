<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dCompatibilityLevelEnum;

	trait dCompatibilityLevel {
		#[Option('-dCompatibilityLevel')]
		protected ?dCompatibilityLevelEnum $dCompatibilityLevel = dCompatibilityLevelEnum::PDF14;

		public function compatibilityLevel (?dCompatibilityLevelEnum $dCompatibilityLevel) : self {
			$this->dCompatibilityLevel = $dCompatibilityLevel;

			return $this;
		}
	}
