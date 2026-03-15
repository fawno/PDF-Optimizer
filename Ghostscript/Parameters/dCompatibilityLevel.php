<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dCompatibilityLevel : string {
		case PDF13 = '1.3';
		case PDF14 = '1.4';
		case PDF15 = '1.5';
		case PDF16 = '1.6';
		case PDF17 = '1.7';
	}
