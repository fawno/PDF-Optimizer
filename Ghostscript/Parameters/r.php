<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\ShortOption;

	trait r {
		#[ShortOption('-r')]
		protected ?string $r = null;

		public function resolution (?int $x, ?int $y = null) : self {
			$this->r = null;

			if ($x) {
				$this->r = $x . ($y ? 'x' . $y : '');
			}

			return $this;
		}
	}
