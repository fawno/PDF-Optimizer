<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dImageDownsampleType : string {
		case SUBSAMPLE = '/Subsample';
		case AVERAGE   = '/Average';
		case BICUBIC   = '/Bicubic';
	}
