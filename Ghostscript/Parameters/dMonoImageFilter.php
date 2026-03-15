<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dMonoImageFilter: string {
		case CCITT      = '/CCITTFaxEncode';
		case FLATE      = '/FlateEncode';
		case RUN_LENGTH = '/RunLengthEncode';
	}
