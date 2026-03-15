<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dImageFilter : string {
		case JPEG = '/DCTEncode';
		case ZIP  = '/FlateEncode';
	}
