<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	enum dPDFA : int {
		/** PDF/A-1 */
		case PDFA1 = 1;
		/** PDF/A-2 */
		case PDFA2 = 2;
		/** PDF/A-3 */
		case PDFA3 = 3;
	}
