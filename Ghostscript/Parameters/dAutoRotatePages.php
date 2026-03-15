<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dAutoRotatePagesEnum;

	trait dAutoRotatePages {
		#[Option('-dAutoRotatePages')]
		protected ?dAutoRotatePagesEnum $dAutoRotatePages = null;

		public function autoRotatePages (?dAutoRotatePagesEnum $dAutoRotatePages) : self {
			$this->dAutoRotatePages = $dAutoRotatePages;

			return $this;
		}
	}
