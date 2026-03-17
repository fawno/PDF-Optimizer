<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	readonly class GhostscriptCustomParameter {
		private function __construct(public string $name, public ?string $value) {}

		/**
		 * Create custom Ghostscript parameter
		 *
		 * **Examples:**
		 *
		 * GhostscriptCustomParameter::create('sName', 'value'); //output: "-sName=value"
		 *
		 * GhostscriptCustomParameter::create('sName'); //output: "-sName"
		 *
		 * GhostscriptCustomParameter::create('', 'value'); //output: "value"
		 *
		 * @param string $name
		 * @param null|string $value
		 * @return GhostscriptCustomParameter
		 */
		public static function create (string $name, ?string $value = null) : self {
			return new self($name, $value);
		}

		public function __toString() : string {
			return ($this->name ? '-' . $this->name . (!is_null($this->value) ? '=' . $this->value : '') : $this->value);
		}
	}
