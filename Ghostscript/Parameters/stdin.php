<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait stdin {
		#[Flag('-_')]
		protected bool $stdin = false;

		public function stdin (bool $stdin = true) : self {
			$this->stdin = $stdin;

			return $this;
		}
	}
