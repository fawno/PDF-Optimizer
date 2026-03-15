<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait dNOPAUSE {
		#[Flag('-dNOPAUSE')]
		protected bool $dNOPAUSE = true;

		public function noPause (bool $dNOPAUSE) : self {
			$this->dNOPAUSE = $dNOPAUSE;

			return $this;
		}
	}
