<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dAutoRotatePagesEnum : string {
		case NONE         = '/None';
		case ALL          = '/All';
		case PAGE_BY_PAGE = '/PageByPage';
	}
