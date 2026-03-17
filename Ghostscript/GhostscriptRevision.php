<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript;

	use FFI\CData;

	readonly class GhostscriptRevision {
		private function __construct (
			public string $product,
			public string $copyright,
			public int $revision,
			public int $revisiondate
		) {}

		public static function create (CData $gsapi_revision)  : GhostscriptRevision {
			return new self(
				$gsapi_revision->product,
				$gsapi_revision->copyright,
				$gsapi_revision->revision,
				$gsapi_revision->revisiondate,
			);
		}
	}
