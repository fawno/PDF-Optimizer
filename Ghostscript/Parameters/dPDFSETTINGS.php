<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dPDFSETTINGS : string {
		case SCREEN   = '/screen';
		case EBOOK    = '/ebook';
		case PRINTER  = '/printer';
		case PREPRESS = '/prepress';
		case DEFAULT  = '/default';
	}
