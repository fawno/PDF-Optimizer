<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Type;

	use ArrayObject;

	class GSAPIParameters {
		private function __construct(protected ArrayObject $arguments) {}

		public static function create (GSAPIParameter ...$arguments) : GSAPIParameters {
			return new self(new ArrayObject($arguments));
		}

		public function append(GSAPIParameter ...$arguments) : GSAPIParameters {
			array_map([$this->arguments, 'append'], $arguments);

			return $this;
		}

		public function copy () : GSAPIParameters  {
			return self::create(...$this->arguments->getArrayCopy());
		}

		public function getParameters () : array {
			return array_map('trim', $this->arguments->getArrayCopy());
		}
	}
