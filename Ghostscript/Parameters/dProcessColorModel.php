<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dProcessColorModelEnum;

	trait dProcessColorModel {
		#[Option('-dProcessColorModel')]
		protected ?dProcessColorModelEnum $dProcessColorModel = dProcessColorModelEnum::RGB;

		public function processColorModel (?dProcessColorModelEnum $dProcessColorModel) : self {
			$this->dProcessColorModel = $dProcessColorModel;

			return $this;
		}
	}
