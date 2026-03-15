<?php
  declare(strict_types=1);

	namespace Fawno\Ghostscript\Type;

	readonly class GSAPIParameter {
		private function __construct(public string $name, public ?string $value) {}

		public static function create (string $name, ?string $value = null) : self {
			return new self($name, $value);
		}

		public function __toString() : string {
			return ($this->name ? '-' . $this->name . (!is_null($this->value) ? '=' . $this->value : '') : $this->value);
		}
	}
