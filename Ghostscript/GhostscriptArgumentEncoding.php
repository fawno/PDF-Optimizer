<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript;

	enum GhostscriptArgumentEncoding : int {
		case Local   = 0;
		case UTF8    = 1;
		case UTF16LE = 2;
	}
