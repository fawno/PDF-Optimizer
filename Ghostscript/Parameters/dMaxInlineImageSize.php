<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dMaxInlineImageSize {
		#[Option('-dMaxInlineImageSize')]
		protected ?int $dMaxInlineImageSize = null;

		public function maxInlineImageSize (?int $dMaxInlineImageSize) : self {
			$this->dMaxInlineImageSize = $dMaxInlineImageSize;

			return $this;
		}
	}
