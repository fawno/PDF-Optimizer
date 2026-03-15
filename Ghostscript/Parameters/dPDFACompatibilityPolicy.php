<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Parameters\Enums\dPDFACompatibilityPolicyEnum;

	trait dPDFACompatibilityPolicy {
		#[Option('-dPDFACompatibilityPolicy')]
		protected ?dPDFACompatibilityPolicyEnum $dPDFACompatibilityPolicy = null;

		/**
		 * PDFACompatibilityPolicy
		 *
		 * When an operation (e.g. pdfmark) is encountered which cannot be
		 * emitted in a PDF/A compliant file, this policy is consulted,
		 * there are currently three possible values:
		 * - 0: (default) Include the feature or operation in the output file,
		 *      the file will not be PDF/A compliant. Because the document Catalog
		 *      is emitted before this is encountered, the file will still contain
		 *      PDF/A metadata but will not be compliant. A warning will be emitted
		 *      in this case.
		 * - 1: The feature or operation is ignored, the resulting PDF file will be
		 *      PDF/A compliant. A warning will be emitted for every elided feature.
		 * - 2: Processing of the file is aborted with an error, the exact error may
		 *      vary depending on the nature of the PDF/A incompatibility.
		 *
		 * @param null|dPDFACompatibilityPolicyEnum $dPDFACompatibilityPolicy
		 * @return GhostscriptParameters
		 */
		public function PDFACompatibilityPolicy (?dPDFACompatibilityPolicyEnum $dPDFACompatibilityPolicy) : self {
			$this->dPDFACompatibilityPolicy = $dPDFACompatibilityPolicy;

			return $this;
		}
	}
