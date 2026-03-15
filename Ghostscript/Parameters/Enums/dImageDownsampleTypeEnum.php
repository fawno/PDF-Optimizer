<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dImageDownsampleTypeEnum : string {
		case SUBSAMPLE = '/Subsample';
		case AVERAGE   = '/Average';
		case BICUBIC   = '/Bicubic';
	}
