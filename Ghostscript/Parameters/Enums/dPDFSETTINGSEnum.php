<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dPDFSETTINGSEnum : string {
		case SCREEN   = '/screen';
		case EBOOK    = '/ebook';
		case PRINTER  = '/printer';
		case PREPRESS = '/prepress';
		case DEFAULT  = '/default';
	}
