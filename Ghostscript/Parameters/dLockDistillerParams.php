<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dLockDistillerParams {
		#[Option('-dLockDistillerParams')]
		protected ?bool $dLockDistillerParams = null;

		public function lockDistillerParams (?bool $dLockDistillerParams) : self {
			$this->dLockDistillerParams = $dLockDistillerParams;

			return $this;
		}
	}
