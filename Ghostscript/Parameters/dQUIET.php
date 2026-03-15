<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait dQUIET {
		#[Flag('-dQUIET')]
		protected bool $dQUIET = true;

		public function quiet (bool $dQUIET) : self {
			$this->dQUIET = $dQUIET;

			return $this;
		}
	}
