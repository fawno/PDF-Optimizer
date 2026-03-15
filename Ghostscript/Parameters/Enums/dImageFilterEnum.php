<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dImageFilterEnum : string {
		case JPEG = '/DCTEncode';
		case ZIP  = '/FlateEncode';
	}
