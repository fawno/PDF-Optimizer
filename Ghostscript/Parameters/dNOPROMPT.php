<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait dNOPROMPT {
		#[Flag('-dNOPROMPT')]
		protected bool $dNOPROMPT = false;

		public function noPrompt (bool $dNOPROMPT = true) : self {
			$this->dNOPROMPT = $dNOPROMPT;

			return $this;
		}
	}
