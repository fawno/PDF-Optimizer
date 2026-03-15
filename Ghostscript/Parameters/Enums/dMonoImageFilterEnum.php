<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dMonoImageFilterEnum: string {
		case CCITT      = '/CCITTFaxEncode';
		case FLATE      = '/FlateEncode';
		case RUN_LENGTH = '/RunLengthEncode';
	}
