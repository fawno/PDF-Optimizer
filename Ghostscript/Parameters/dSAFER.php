<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait dSAFER {
		#[Flag('-dSAFER')]
		protected bool $dSAFER = true;

		public function safer (bool $dSAFER) : self {
			$this->dSAFER = $dSAFER;

			return $this;
		}
	}
