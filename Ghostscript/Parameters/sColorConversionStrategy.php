<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\sColorConversionStrategyEnum;

	trait sColorConversionStrategy {
		#[Option('-sColorConversionStrategy')]
		protected ?sColorConversionStrategyEnum $sColorConversionStrategy = null;

		public function colorConversionStrategy (?sColorConversionStrategyEnum $sColorConversionStrategy) : self {
			$this->sColorConversionStrategy = $sColorConversionStrategy;

			return $this;
		}
	}
