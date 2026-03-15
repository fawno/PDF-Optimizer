<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\sDEVICEEnum;

	trait sDEVICE {
		#[Option('-sDEVICE')]
		protected sDEVICEEnum $sDEVICE = sDEVICEEnum::PDFWRITE;

		public function device (sDEVICEEnum $sDEVICE) : self {
			$this->sDEVICE = $sDEVICE;

			return $this;
		}
	}
