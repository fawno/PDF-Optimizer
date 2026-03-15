<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dDefaultRenderingIntentEnum;

	trait dDefaultRenderingIntent {
		#[Option('-dDefaultRenderingIntent')]
		protected ?dDefaultRenderingIntentEnum $dDefaultRenderingIntent = null;

		public function defaultRenderingIntent (?dDefaultRenderingIntentEnum $dDefaultRenderingIntent) : self {
			$this->dDefaultRenderingIntent = $dDefaultRenderingIntent;

			return $this;
		}
	}
