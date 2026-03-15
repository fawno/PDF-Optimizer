<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dParseDSCComments {
		#[Option('-dParseDSCComments')]
		protected ?bool $dParseDSCComments = null;

		public function parseDSCComments (?bool $dParseDSCComments) : self {
			$this->dParseDSCComments = $dParseDSCComments;

			return $this;
		}
	}
