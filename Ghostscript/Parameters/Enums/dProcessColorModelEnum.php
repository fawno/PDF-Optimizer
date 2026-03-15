<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dProcessColorModelEnum : string {
		case GRAY = '/DeviceGray';
		case RGB  = '/DeviceRGB';
		case CMYK = '/DeviceCMYK';
	}
