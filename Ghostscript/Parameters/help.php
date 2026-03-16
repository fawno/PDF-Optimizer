<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait help {
		#[Flag('-h')]
		protected bool $help = false;

		public function help (bool $help = true) : self {
			$this->help = $help;

			return $this;
		}
	}
