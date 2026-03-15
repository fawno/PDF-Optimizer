<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters;

	use Fawno\Ghostscript\Attributes\Option;

	trait dFastWebView {
		#[Option('-dFastWebView')]
		protected ?bool $dFastWebView = null;

		/**
		 * FastWebView
		 *
		 * Takes a Boolean argument, default is false. When set to true pdfwrite will reorder
		 * the output PDF file to conform to the Adobe ‘linearised’ PDF specification.
		 * The Acrobat user interface refers to this as ‘Optimised for Fast Web Viewing’.
		 *
		 * Note that this will cause the conversion to PDF to be slightly slower and will usually
		 * result in a slightly larger PDF file. This option is incompatible with producing an
		 * encrypted (password protected) PDF file.
		 *
		 * @param null|bool $dFastWebView
		 * @return GhostscriptParameters
		 */
		public function fastWebView (?bool $dFastWebView) : self {
			$this->dFastWebView = $dFastWebView;

			return $this;
		}
	}
