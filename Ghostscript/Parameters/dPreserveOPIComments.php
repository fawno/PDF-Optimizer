<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPreserveOPIComments {
		#[Option('-dPreserveOPIComments')]
		protected ?bool $dPreserveOPIComments = null;

		public function preserveOPIComments (?bool $dPreserveOPIComments) : self {
			$this->dPreserveOPIComments = $dPreserveOPIComments;

			return $this;
		}
	}
