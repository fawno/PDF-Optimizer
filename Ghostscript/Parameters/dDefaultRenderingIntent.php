<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dDefaultRenderingIntent : string {
		case DEFAULT               = '/Default';
		case PERCEPTUAL            = '/Perceptual';
		case SATURATION            = '/Saturation';
		case ABSOLUTE_COLORIMETRIC = '/AbsoluteColorimetric';
		case RELATIVE_COLORIMETRIC = '/RelativeColorimetric';
	}
