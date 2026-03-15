<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Attributes;

	use Attribute;


	#[Attribute(Attribute::TARGET_PROPERTY)]
	class Flag {
		public function __construct(public string $name) {}
	}
