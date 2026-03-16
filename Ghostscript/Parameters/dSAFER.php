<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait dSAFER {
		#[Flag('-dSAFER')]
		protected bool $dSAFER = true;

		#[Flag('-dNOSAFER')]
		protected bool $dNOSAFER = false;

		public function safer (bool $dSAFER = true) : self {
			$this->dSAFER = $dSAFER;
			$this->dNOSAFER = !$dSAFER;

			return $this;
		}
	}
