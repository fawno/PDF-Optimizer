<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dUCRandBGInfoEnum;

	trait dUCRandBGInfo {
		#[Option('-dUCRandBGInfo')]
		protected ?dUCRandBGInfoEnum $dUCRandBGInfo = null;

		public function UCRandBGInfo (?dUCRandBGInfoEnum $dUCRandBGInfo) : self {
			$this->dUCRandBGInfo = $dUCRandBGInfo;

			return $this;
		}
	}
