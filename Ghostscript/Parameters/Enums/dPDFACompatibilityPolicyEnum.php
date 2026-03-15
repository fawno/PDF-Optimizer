<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	enum dPDFACompatibilityPolicyEnum : int {
		/**
		 * (default) Include the feature or operation in the output file,
		 * the file will not be PDF/A compliant.
		 * Because the document Catalog is emitted before this is encountered,
		 * the file will still contain PDF/A metadata but will not be compliant.
		 * A warning will be emitted in this case.
		 */
		case PDFACOMP0 = 0;
		/**
		 * The feature or operation is ignored, the resulting PDF file will be
		 * PDF/A compliant.
		 * A warning will be emitted for every elided feature.
		 */
		case PDFACOMP1 = 1;
		/**
		 * Processing of the file is aborted with an error, the exact error may
		 * vary depending on the nature of the PDF/A incompatibility.
		 */
		case PDFACOMP2 = 2;
	}
