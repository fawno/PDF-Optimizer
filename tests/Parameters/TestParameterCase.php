<?php
	declare(strict_types=1);

	namespace Fawno\PDFOptimizer\Tests\Parameters;

	use Fawno\PDFOptimizer\Tests\TestCase;
	use ReflectionClass;
	use ReflectionNamedType;
	use ReflectionProperty;
	use ReflectionUnionType;

	class TestParameterCase extends TestCase {
		public function assertIsTrait (string $trait, string $message = '') : void {
			$trait = new ReflectionClass($trait);
			$this->assertTrue($trait->isTrait(), $message);
		}

		public function assertClassHasProperty (string $class, string $expected) : void {
			new ReflectionProperty($class, $expected);
		}

		public function assertClassPropertyIsType (string $class, string $name, string|array $expected) : void {
			$expected = is_string($expected) ? [$expected] : $expected;

			$property = new ReflectionProperty($class, $name);
			$type = $property->getType();

			if (($type = $property->getType()) instanceof ReflectionUnionType) {
				$actual = array_map(function(ReflectionNamedType $t) {
					return $t->getName();
				}, $type->getTypes());
			} else {
				$actual = [$type->getName()];
				if ($type->allowsNull()) {
					$actual[] = 'null';
				}
			}

			$this->assertEquals($expected, $actual);
		}
	}
