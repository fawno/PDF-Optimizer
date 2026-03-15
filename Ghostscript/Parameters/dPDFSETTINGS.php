<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dPDFSETTINGSEnum;

	trait dPDFSETTINGS {
		#[Option('-dPDFSETTINGS')]
		protected dPDFSETTINGSEnum $dPDFSETTINGS = dPDFSETTINGSEnum::EBOOK;

		public function pdfSettings (dPDFSETTINGSEnum $dPDFSETTINGS) : self {
			$this->dPDFSETTINGS = $dPDFSETTINGS;

			return $this;
		}
	}
