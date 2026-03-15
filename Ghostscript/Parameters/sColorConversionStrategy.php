<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum sColorConversionStrategy : string {
		case UNCHANGED                = 'LeaveColorUnchanged';
		case GRAY                     = 'Gray';
		case RGB                      = 'RGB';
		case CMYK                     = 'CMYK';
		case DEVICE_INDEPENDENT_COLOR = 'UseDeviceIndependentColor';
	}
