<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript;

	use BackedEnum;
	use Fawno\Ghostscript\Attributes\Flag;
	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Attributes\ShortOption;
	use Fawno\Ghostscript\Parameters\dPDFSETTINGS;
	use Fawno\Ghostscript\Parameters\sDEVICE;
	use Fawno\Ghostscript\Parameters\dAutoRotatePages;
	use Fawno\Ghostscript\Parameters\dCompatibilityLevel;
	use Fawno\Ghostscript\Parameters\dDefaultRenderingIntent;
	use Fawno\Ghostscript\Parameters\dImageDepth;
	use Fawno\Ghostscript\Parameters\dProcessColorModel;
	use Fawno\Ghostscript\Parameters\dImageDownsampleType;
	use Fawno\Ghostscript\Parameters\dImageFilter;
	use Fawno\Ghostscript\Parameters\dMonoImageFilter;
	use Fawno\Ghostscript\Parameters\dPDFA;
	use Fawno\Ghostscript\Parameters\dPDFACompatibilityPolicy;
	use Fawno\Ghostscript\Parameters\dUCRandBGInfo;
	use Fawno\Ghostscript\Parameters\sColorConversionStrategy;
	use Fawno\Ghostscript\Type\GSAPIParameter;
	use ReflectionClass;

	class GhostscriptParameters {
		protected array $parameters = [];

		#[Flag('-dQUIET')]
		protected bool $dQUIET = true;

		#[Flag('-dSAFER')]
		protected bool $dSAFER = true;

		#[Flag('-dBATCH')]
		protected bool $dBATCH = true;

		#[Flag('-dNOPAUSE')]
		protected bool $dNOPAUSE = true;

		#[Option('-sDEVICE')]
		protected sDEVICE $sDEVICE = sDEVICE::PDFWRITE;

		#[Option('-dPDFSETTINGS')]
		protected dPDFSETTINGS $dPDFSETTINGS = dPDFSETTINGS::EBOOK;

		#[Option('-dFastWebView')]
		protected ?bool $dFastWebView = null;

		#[Option('-dDetectDuplicateImages')]
		protected ?bool $dDetectDuplicateImages = null;

		#[Option('-dPreserveMarkedContent')]
		protected ?bool $dPreserveMarkedContent = null;

		#[Option('-dPDFX')]
		protected ?bool $dPDFX = null;

		#[Option('-dPDFA')]
		protected ?dPDFA $dPDFA = null;

		#[Option('-dPDFACompatibilityPolicy')]
		protected ?dPDFACompatibilityPolicy $dPDFACompatibilityPolicy = null;

		#[Option('-dMaxInlineImageSize')]
		protected ?int $dMaxInlineImageSize = null;

		#[Option('-dEmbedAllFonts')]
		protected ?bool $dEmbedAllFonts = null;

		#[Option('-dSubsetFonts')]
		protected ?bool $dSubsetFonts = null;

		#[Option('-dCompressFonts')]
		protected ?bool $dCompressFonts = null;

		#[Option('-dConvertCMYKImagesToRGB')]
		protected ?bool $dConvertCMYKImagesToRGB = null;

		#[Option('-dDownsampleColorImages')]
		protected ?bool $dDownsampleColorImages = null;

		#[Option('-dDownsampleGrayImages')]
		protected ?bool $dDownsampleGrayImages = null;

		#[Option('-dDownsampleMonoImages')]
		protected ?bool $dDownsampleMonoImages = null;

		#[Option('-dColorImageResolution')]
		protected ?int $dColorImageResolution = null;

		#[Option('-dGrayImageResolution')]
		protected ?int $dGrayImageResolution = null;

		#[Option('-dMonoImageResolution')]
		protected ?int $dMonoImageResolution = null;

		#[Option('-dPreserveEPSInfo')]
		protected ?bool $dPreserveEPSInfo = null;

		#[Option('-dPreserveOPIComments')]
		protected ?bool $dPreserveOPIComments = null;

		#[Option('-dASCII85EncodePages')]
		protected ?bool $dASCII85EncodePages = null;

		#[Option('-dAutoFilterColorImages')]
		protected ?bool $dAutoFilterColorImages = null;

		#[Option('-dAutoFilterGrayImages')]
		protected ?bool $dAutoFilterGrayImages = null;

		#[Option('-dColorImageDownsampleThreshold')]
		protected ?float $dColorImageDownsampleThreshold = null;

		#[Option('-dGrayImageDownsampleThreshold')]
		protected ?float $dGrayImageDownsampleThreshold = null;

		#[Option('-dMonoImageDownsampleThreshold')]
		protected ?float $dMonoImageDownsampleThreshold = null;

		#[Option('-dCompressPages')]
		protected ?bool $dCompressPages = null;

		#[Option('-dEncodeColorImages')]
		protected ?bool $dEncodeColorImages = null;

		#[Option('-dEncodeGrayImages')]
		protected ?bool $dEncodeGrayImages = null;

		#[Option('-dEncodeMonoImages')]
		protected ?bool $dEncodeMonoImages = null;

		#[Option('-dLockDistillerParams')]
		protected ?bool $dLockDistillerParams = null;

		#[Option('-dMaxSubsetPct')]
		protected ?int $dMaxSubsetPct = null;

		#[Option('-dParseDSCComments')]
		protected ?bool $dParseDSCComments = null;

		#[Option('-dParseDSCCommentsForDocInfo')]
		protected ?bool $dParseDSCCommentsForDocInfo = null;

		#[Option('-dPreserveHalftoneInfo')]
		protected ?bool $dPreserveHalftoneInfo = null;

		#[Option('-dPreserveOverprintSettings')]
		protected ?bool $dPreserveOverprintSettings = null;

		#[Option('-dUseFlateCompression')]
		protected ?bool $dUseFlateCompression = null;

		#[Option('-dPassThroughJPEGImages')]
		protected ?bool $dPassThroughJPEGImages = null;

		#[Option('-dPassThroughJPXImages')]
		protected ?bool $dPassThroughJPXImages = null;

		#[Option('-dCompatibilityLevel')]
		protected ?dCompatibilityLevel $dCompatibilityLevel = dCompatibilityLevel::PDF14;

		#[Option('-dProcessColorModel')]
		protected ?dProcessColorModel $dProcessColorModel = dProcessColorModel::RGB;

		#[Option('-sColorConversionStrategy')]
		protected ?sColorConversionStrategy $sColorConversionStrategy = null;

		#[Option('-dUCRandBGInfo')]
		protected ?dUCRandBGInfo $dUCRandBGInfo = null;

		#[Option('-dAutoRotatePages')]
		protected ?dAutoRotatePages $dAutoRotatePages = null;

		#[Option('-dColorImageDownsampleType')]
		protected ?dImageDownsampleType $dColorImageDownsampleType = null;

		#[Option('-dGrayImageDownsampleType')]
		protected ?dImageDownsampleType $dGrayImageDownsampleType = null;

		#[Option('-dMonoImageDownsampleType')]
		protected ?dImageDownsampleType $dMonoImageDownsampleType = null;

		#[Option('-dColorImageDepth')]
		protected ?dImageDepth $dColorImageDepth = null;

		#[Option('-dGrayImageDepth')]
		protected ?dImageDepth $dGrayImageDepth = null;

		#[Option('-dMonoImageDepth')]
		protected ?dImageDepth $dMonoImageDepth = null;

		#[Option('-dColorImageFilter')]
		protected ?dImageFilter $dColorImageFilter = null;

		#[Option('-dGrayImageFilter')]
		protected ?dImageFilter $dGrayImageFilter = null;

		#[Option('-dMonoImageFilter')]
		protected ?dMonoImageFilter $dMonoImageFilter = null;

		#[Option('-dDefaultRenderingIntent')]
		protected ?dDefaultRenderingIntent $dDefaultRenderingIntent = null;

		#[ShortOption('-r')]
		protected ?string $r = null;

		#[Option('-dFIXEDRESOLUTION')]
		protected ?int $dFIXEDRESOLUTION = null;

		public static function create () : self {
			return new self();
		}

		public function device (sDEVICE $sDEVICE) : self {
			$this->sDEVICE = $sDEVICE;

			return $this;
		}

		public function quiet (bool $dQUIET) : self {
			$this->dQUIET = $dQUIET;

			return $this;
		}

		public function pdfSettings (dPDFSETTINGS $dPDFSETTINGS) : self {
			$this->dPDFSETTINGS = $dPDFSETTINGS;

			return $this;
		}

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

		/**
		 * DetectDuplicateImages
		 *
		 * Takes a Boolean argument, when set to true (the default) pdfwrite will compare all
		 * new images with all the images encountered to date (NOT small images which are
		 * stored in-line) to see if the new image is a duplicate of an earlier one.
		 * If it is a duplicate then instead of writing a new image into the PDF file,
		 * the PDF will reuse the reference to the earlier image. This can considerably reduce
		 * the size of the output PDF file, but increases the time taken to process the file.
		 *
		 * This time grows exponentially as more images are added, and on large input files with
		 * numerous images can be prohibitively slow. Setting this to false will improve
		 * performance at the cost of final file size.
		 *
		 * @param null|bool $dDetectDuplicateImages
		 * @return GhostscriptParameters
		 */
		public function detectDuplicateImages (?bool $dDetectDuplicateImages) : self {
			$this->dDetectDuplicateImages = $dDetectDuplicateImages;

			return $this;
		}

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

		public function PDFX (?bool $dPDFX) : self {
			$this->dPDFX = $dPDFX;

			return $this;
		}

		/**
		 * PDFA
		 *
		 * Specify the PDF/A-1, PDF/A-2 or PDF/A-3.
		 *
		 * @param null|dPDFA $dPDFA
		 * @return GhostscriptParameters
		 */
		public function PDFA (?dPDFA $dPDFA) : self {
			$this->dPDFA = $dPDFA;

			return $this;
		}

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
		 * @param null|dPDFACompatibilityPolicy $dPDFACompatibilityPolicy
		 * @return GhostscriptParameters
		 */
		public function PDFACompatibilityPolicy (?dPDFACompatibilityPolicy $dPDFACompatibilityPolicy) : self {
			$this->dPDFACompatibilityPolicy = $dPDFACompatibilityPolicy;

			return $this;
		}

		public function maxInlineImageSize (?int $dMaxInlineImageSize) : self {
			$this->dMaxInlineImageSize = $dMaxInlineImageSize;

			return $this;
		}

		public function embedAllFonts (?bool $dEmbedAllFonts) : self {
			$this->dEmbedAllFonts = $dEmbedAllFonts;

			return $this;
		}

		public function subsetFonts (?bool $dSubsetFonts) : self {
			$this->dSubsetFonts = $dSubsetFonts;

			return $this;
		}

		public function compressFonts (?bool $dCompressFonts) : self {
			$this->dCompressFonts = $dCompressFonts;

			return $this;
		}

		public function convertCMYKImagesToRGB (?bool $dConvertCMYKImagesToRGB) : self {
			$this->dConvertCMYKImagesToRGB = $dConvertCMYKImagesToRGB;

			return $this;
		}

		public function downsampleColorImages (?bool $dDownsampleColorImages) : self {
			$this->dDownsampleColorImages = $dDownsampleColorImages;

			return $this;
		}

		public function downsampleGrayImages (?bool $dDownsampleGrayImages) : self {
			$this->dDownsampleGrayImages = $dDownsampleGrayImages;

			return $this;
		}

		public function downsampleMonoImages (?bool $dDownsampleMonoImages) : self {
			$this->dDownsampleMonoImages = $dDownsampleMonoImages;

			return $this;
		}

		public function colorImageResolution (?int $dColorImageResolution) : self {
			$this->dColorImageResolution = $dColorImageResolution;

			return $this;
		}

		public function grayImageResolution (?int $dGrayImageResolution) : self {
			$this->dGrayImageResolution = $dGrayImageResolution;

			return $this;
		}

		public function monoImageResolution (?int $dMonoImageResolution) : self {
			$this->dMonoImageResolution = $dMonoImageResolution;

			return $this;
		}

		public function preserveEPSInfo (?bool $dPreserveEPSInfo) : self {
			$this->dPreserveEPSInfo = $dPreserveEPSInfo;

			return $this;
		}

		public function preserveOPIComments (?bool $dPreserveOPIComments) : self {
			$this->dPreserveOPIComments = $dPreserveOPIComments;

			return $this;
		}

		public function ASCII85EncodePages (?bool $dASCII85EncodePages) : self {
			$this->dASCII85EncodePages = $dASCII85EncodePages;

			return $this;
		}

		public function autoFilterColorImages (?bool $dAutoFilterColorImages) : self {
			$this->dAutoFilterColorImages = $dAutoFilterColorImages;

			return $this;
		}

		public function autoFilterGrayImages (?bool $dAutoFilterGrayImages) : self {
			$this->dAutoFilterGrayImages = $dAutoFilterGrayImages;

			return $this;
		}

		public function colorImageDownsampleThreshold (?float $dColorImageDownsampleThreshold) : self {
			$this->dColorImageDownsampleThreshold = $dColorImageDownsampleThreshold;

			return $this;
		}

		public function grayImageDownsampleThreshold (?float $dGrayImageDownsampleThreshold) : self {
			$this->dGrayImageDownsampleThreshold = $dGrayImageDownsampleThreshold;

			return $this;
		}

		public function monoImageDownsampleThreshold (?float $dMonoImageDownsampleThreshold) : self {
			$this->dMonoImageDownsampleThreshold = $dMonoImageDownsampleThreshold;

			return $this;
		}

		public function compressPages (?bool $dCompressPages) : self {
			$this->dCompressPages = $dCompressPages;

			return $this;
		}

		public function encodeColorImages (?bool $dEncodeColorImages) : self {
			$this->dEncodeColorImages = $dEncodeColorImages;

			return $this;
		}

		public function encodeGrayImages (?bool $dEncodeGrayImages) : self {
			$this->dEncodeGrayImages = $dEncodeGrayImages;

			return $this;
		}

		public function encodeMonoImages (?bool $dEncodeMonoImages) : self {
			$this->dEncodeMonoImages = $dEncodeMonoImages;

			return $this;
		}

		public function lockDistillerParams (?bool $dLockDistillerParams) : self {
			$this->dLockDistillerParams = $dLockDistillerParams;

			return $this;
		}

		public function maxSubsetPct (?int $dMaxSubsetPct) : self {
			$this->dMaxSubsetPct = $dMaxSubsetPct;

			return $this;
		}

		public function parseDSCComments (?bool $dParseDSCComments) : self {
			$this->dParseDSCComments = $dParseDSCComments;

			return $this;
		}

		public function parseDSCCommentsForDocInfo (?bool $dParseDSCCommentsForDocInfo) : self {
			$this->dParseDSCCommentsForDocInfo = $dParseDSCCommentsForDocInfo;

			return $this;
		}

		public function preserveHalftoneInfo (?bool $dPreserveHalftoneInfo) : self {
			$this->dPreserveHalftoneInfo = $dPreserveHalftoneInfo;

			return $this;
		}

		public function preserveOverprintSettings (?bool $dPreserveOverprintSettings) : self {
			$this->dPreserveOverprintSettings = $dPreserveOverprintSettings;

			return $this;
		}

		public function useFlateCompression (?bool $dUseFlateCompression) : self {
			$this->dUseFlateCompression = $dUseFlateCompression;

			return $this;
		}

		public function passThroughJPEGImages (?bool $dPassThroughJPEGImages) : self {
			$this->dPassThroughJPEGImages = $dPassThroughJPEGImages;

			return $this;
		}

		public function passThroughJPXImages (?bool $dPassThroughJPXImages) : self {
			$this->dPassThroughJPXImages = $dPassThroughJPXImages;

			return $this;
		}

		public function compatibilityLevel (?dCompatibilityLevel $dCompatibilityLevel) : self {
			$this->dCompatibilityLevel = $dCompatibilityLevel;

			return $this;
		}

		public function processColorModel (?dProcessColorModel $dProcessColorModel) : self {
			$this->dProcessColorModel = $dProcessColorModel;

			return $this;
		}

		public function colorConversionStrategy (?sColorConversionStrategy $sColorConversionStrategy) : self {
			$this->sColorConversionStrategy = $sColorConversionStrategy;

			return $this;
		}

		public function UCRandBGInfo (?dUCRandBGInfo $dUCRandBGInfo) : self {
			$this->dUCRandBGInfo = $dUCRandBGInfo;

			return $this;
		}

		public function autoRotatePages (?dAutoRotatePages $dAutoRotatePages) : self {
			$this->dAutoRotatePages = $dAutoRotatePages;

			return $this;
		}

		public function colorImageDownsampleType (?dImageDownsampleType $dColorImageDownsampleType) : self {
			$this->dColorImageDownsampleType = $dColorImageDownsampleType;

			return $this;
		}

		public function grayImageDownsampleType (?dImageDownsampleType $dGrayImageDownsampleType) : self {
			$this->dGrayImageDownsampleType = $dGrayImageDownsampleType;

			return $this;
		}

		public function monoImageDownsampleType (?dImageDownsampleType $dMonoImageDownsampleType) : self {
			$this->dMonoImageDownsampleType = $dMonoImageDownsampleType;

			return $this;
		}

		public function colorImageDepth (?dImageDepth $dColorImageDepth) : self {
			$this->dColorImageDepth = $dColorImageDepth;

			return $this;
		}

		public function grayImageDepth (?dImageDepth $dGrayImageDepth) : self {
			$this->dGrayImageDepth = $dGrayImageDepth;

			return $this;
		}

		public function monoImageDepth (?dImageDepth $dMonoImageDepth) : self {
			$this->dMonoImageDepth = $dMonoImageDepth;

			return $this;
		}

		public function colorImageFilter (?dImageFilter $dColorImageFilter) : self {
			$this->dColorImageFilter = $dColorImageFilter;

			return $this;
		}

		public function grayImageFilter (?dImageFilter $dGrayImageFilter) : self {
			$this->dGrayImageFilter = $dGrayImageFilter;

			return $this;
		}

		public function monoImageFilter (?dMonoImageFilter $dMonoImageFilter) : self {
			$this->dMonoImageFilter = $dMonoImageFilter;

			return $this;
		}

		public function defaultRenderingIntent (?dDefaultRenderingIntent $dDefaultRenderingIntent) : self {
			$this->dDefaultRenderingIntent = $dDefaultRenderingIntent;

			return $this;
		}

		public function resolution (?int $x, ?int $y = null) : self {
			$this->r = null;

			if ($x) {
				$this->r = $x . ($y ? 'x' . $y : '');
			}

			return $this;
		}

		public function fixedResolution (?int $dFIXEDRESOLUTION) : self {
			$this->dFIXEDRESOLUTION = $dFIXEDRESOLUTION;

			return $this;
		}

		public function setParameters (GSAPIParameter ...$parameters) : self {
			$this->parameters = array_map('trim', $parameters);

			return $this;
		}

		public function getParameters (?string $inputFile = null, ?string $outputFile = null) : array {
			$parameters = [];

			$reflection = new ReflectionClass($this);
			foreach ($reflection->getProperties() as $property) {
				if (null === $value = $property->getValue($this)) {
					continue;
				}

				$value = is_a($value, BackedEnum::class) ? $value->value : $value;

				$attributes = $property->getAttributes(Flag::class);
				foreach ($attributes as $attribute) {
					if ($value === true) {
						$instance = $attribute->newInstance();
						$parameters[] = $instance->name;
					}

					continue;
				}

				$attributes = $property->getAttributes(ShortOption::class);
				foreach ($attributes as $attribute) {
					$instance = $attribute->newInstance();

					if (is_bool($value)) {
						$value = $value ? 'true' : 'false';
					}

					$parameters[] = $instance->name . $value;
				}

				$attributes = $property->getAttributes(Option::class);
				foreach ($attributes as $attribute) {
					$instance = $attribute->newInstance();

					if (is_bool($value)) {
						$value = $value ? 'true' : 'false';
					}

					$parameters[] = $instance->name . '=' . $value;
				}
			}

			$parameters = array_merge($parameters, $this->parameters);

			if ($outputFile) {
				$parameters[] = '-sOutputFile=' . $outputFile;
			}

			if ($inputFile) {
				$parameters[] = $inputFile;
			}

			return $parameters;
		}
	}
