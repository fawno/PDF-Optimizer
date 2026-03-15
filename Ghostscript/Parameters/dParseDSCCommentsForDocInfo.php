<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dParseDSCCommentsForDocInfo {
		#[Option('-dParseDSCCommentsForDocInfo')]
		protected ?bool $dParseDSCCommentsForDocInfo = null;

		public function parseDSCCommentsForDocInfo (?bool $dParseDSCCommentsForDocInfo) : self {
			$this->dParseDSCCommentsForDocInfo = $dParseDSCCommentsForDocInfo;

			return $this;
		}
	}
