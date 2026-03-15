<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dUCRandBGInfo : string {
		case REMOVE   = '/Remove';
		case PRESERVE = '/Preserve';
	}
