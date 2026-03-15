<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dPreserveMarkedContent {
		#[Option('-dPreserveMarkedContent')]
		protected ?bool $dPreserveMarkedContent = null;

		/**
		 * PreserveMarkedContent
		 *
		 * We now attempt to preserve marked content from input PDF files through to the output
		 * PDF file (note, not in output PostScript!) This does not include marked content relating
		 * to optional content, because currently we do not preserve optional content, it is
		 * instead applied by the interpreter.
		 *
		 * This control also requires the PDF interpreter to pass the marked content to the
		 * pdfwrite device, this is only done with the new (C-based) PDF interpreter. The
		 * old (PostScript-based) interpreter does not support this feature and will not pass
		 * marked content to the pdfwrite device.
		 *
		 * @param null|bool $dPreserveMarkedContent
		 * @return GhostscriptParameters
		 */
		public function preserveMarkedContent (?bool $dPreserveMarkedContent) : self {
			$this->dPreserveMarkedContent = $dPreserveMarkedContent;

			return $this;
		}
	}
