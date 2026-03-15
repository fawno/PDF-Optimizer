<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dImageDepth : int {
		case ONE       = 1;
		case TWO       = 2;
		case FOUR      = 4;
		case EIGHT     = 8;
		case UNCHANGED = -1;
	}
