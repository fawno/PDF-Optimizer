<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dProcessColorModel : string {
		case GRAY = '/DeviceGray';
		case RGB  = '/DeviceRGB';
		case CMYK = '/DeviceCMYK';
	}
