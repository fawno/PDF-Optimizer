<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Flag;

	trait dBATCH {
		#[Flag('-dBATCH')]
		protected bool $dBATCH = true;

		public function batch (bool $dBATCH = true) : self {
			$this->dBATCH = $dBATCH;

			return $this;
		}
	}
