<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript;

	use BackedEnum;
	use Fawno\Ghostscript\Attributes\Flag;
	use Fawno\Ghostscript\Attributes\Option;
	use Fawno\Ghostscript\Attributes\ShortOption;
	use Fawno\Ghostscript\Parameters\dASCII85EncodePages;
	use Fawno\Ghostscript\Parameters\dAutoFilterColorImages;
	use Fawno\Ghostscript\Parameters\dAutoFilterGrayImages;
	use Fawno\Ghostscript\Parameters\dAutoRotatePages;
	use Fawno\Ghostscript\Parameters\dBATCH;
	use Fawno\Ghostscript\Parameters\dColorImageDepth;
	use Fawno\Ghostscript\Parameters\dColorImageDownsampleThreshold;
	use Fawno\Ghostscript\Parameters\dColorImageDownsampleType;
	use Fawno\Ghostscript\Parameters\dColorImageFilter;
	use Fawno\Ghostscript\Parameters\dColorImageResolution;
	use Fawno\Ghostscript\Parameters\dCompatibilityLevel;
	use Fawno\Ghostscript\Parameters\dCompressFonts;
	use Fawno\Ghostscript\Parameters\dCompressPages;
	use Fawno\Ghostscript\Parameters\dConvertCMYKImagesToRGB;
	use Fawno\Ghostscript\Parameters\dDefaultRenderingIntent;
	use Fawno\Ghostscript\Parameters\dDetectDuplicateImages;
	use Fawno\Ghostscript\Parameters\dDownsampleColorImages;
	use Fawno\Ghostscript\Parameters\dDownsampleGrayImages;
	use Fawno\Ghostscript\Parameters\dDownsampleMonoImages;
	use Fawno\Ghostscript\Parameters\dEmbedAllFonts;
	use Fawno\Ghostscript\Parameters\dEncodeColorImages;
	use Fawno\Ghostscript\Parameters\dEncodeGrayImages;
	use Fawno\Ghostscript\Parameters\dEncodeMonoImages;
	use Fawno\Ghostscript\Parameters\dFastWebView;
	use Fawno\Ghostscript\Parameters\dFIXEDRESOLUTION;
	use Fawno\Ghostscript\Parameters\dGrayImageDepth;
	use Fawno\Ghostscript\Parameters\dGrayImageDownsampleThreshold;
	use Fawno\Ghostscript\Parameters\dGrayImageDownsampleType;
	use Fawno\Ghostscript\Parameters\dGrayImageFilter;
	use Fawno\Ghostscript\Parameters\dGrayImageResolution;
	use Fawno\Ghostscript\Parameters\dLockDistillerParams;
	use Fawno\Ghostscript\Parameters\dMaxInlineImageSize;
	use Fawno\Ghostscript\Parameters\dMaxSubsetPct;
	use Fawno\Ghostscript\Parameters\dMonoImageDepth;
	use Fawno\Ghostscript\Parameters\dMonoImageDownsampleThreshold;
	use Fawno\Ghostscript\Parameters\dMonoImageDownsampleType;
	use Fawno\Ghostscript\Parameters\dMonoImageFilter;
	use Fawno\Ghostscript\Parameters\dMonoImageResolution;
	use Fawno\Ghostscript\Parameters\dNOPAUSE;
	use Fawno\Ghostscript\Parameters\dNOPROMPT;
	use Fawno\Ghostscript\Parameters\dParseDSCComments;
	use Fawno\Ghostscript\Parameters\dParseDSCCommentsForDocInfo;
	use Fawno\Ghostscript\Parameters\dPassThroughJPEGImages;
	use Fawno\Ghostscript\Parameters\dPassThroughJPXImages;
	use Fawno\Ghostscript\Parameters\dPDFACompatibilityPolicy;
	use Fawno\Ghostscript\Parameters\dPDFA;
	use Fawno\Ghostscript\Parameters\dPDFSETTINGS;
	use Fawno\Ghostscript\Parameters\dPDFX;
	use Fawno\Ghostscript\Parameters\dPreserveEPSInfo;
	use Fawno\Ghostscript\Parameters\dPreserveHalftoneInfo;
	use Fawno\Ghostscript\Parameters\dPreserveMarkedContent;
	use Fawno\Ghostscript\Parameters\dPreserveOPIComments;
	use Fawno\Ghostscript\Parameters\dPreserveOverprintSettings;
	use Fawno\Ghostscript\Parameters\dProcessColorModel;
	use Fawno\Ghostscript\Parameters\dQUIET;
	use Fawno\Ghostscript\Parameters\dSAFER;
	use Fawno\Ghostscript\Parameters\dSubsetFonts;
	use Fawno\Ghostscript\Parameters\dUCRandBGInfo;
	use Fawno\Ghostscript\Parameters\dUseFlateCompression;
	use Fawno\Ghostscript\Parameters\help;
	use Fawno\Ghostscript\Parameters\r;
	use Fawno\Ghostscript\Parameters\sColorConversionStrategy;
	use Fawno\Ghostscript\Parameters\sDEVICE;
	use Fawno\Ghostscript\Type\GSAPIParameter;
	use ReflectionClass;
	use ReflectionProperty;

	class GhostscriptParameters {
		use dQUIET;
		use dSAFER;
		use dBATCH;
		use dNOPAUSE;
		use sDEVICE;
		use dPDFSETTINGS;
		use dFastWebView;
		use dDetectDuplicateImages;
		use dPreserveMarkedContent;
		use dPDFX;
		use dPDFA;
		use dPDFACompatibilityPolicy;
		use dMaxInlineImageSize;
		use dEmbedAllFonts;
		use dSubsetFonts;
		use dCompressFonts;
		use dConvertCMYKImagesToRGB;
		use dDownsampleColorImages;
		use dDownsampleGrayImages;
		use dDownsampleMonoImages;
		use dColorImageResolution;
		use dGrayImageResolution;
		use dMonoImageResolution;
		use dPreserveEPSInfo;
		use dPreserveOPIComments;
		use dASCII85EncodePages;
		use dAutoFilterColorImages;
		use dAutoFilterGrayImages;
		use dColorImageDownsampleThreshold;
		use dGrayImageDownsampleThreshold;
		use dMonoImageDownsampleThreshold;
		use dCompressPages;
		use dEncodeColorImages;
		use dEncodeGrayImages;
		use dEncodeMonoImages;
		use dLockDistillerParams;
		use dMaxSubsetPct;
		use dParseDSCComments;
		use dParseDSCCommentsForDocInfo;
		use dPreserveHalftoneInfo;
		use dPreserveOverprintSettings;
		use dUseFlateCompression;
		use dPassThroughJPEGImages;
		use dPassThroughJPXImages;
		use dCompatibilityLevel;
		use dProcessColorModel;
		use sColorConversionStrategy;
		use dUCRandBGInfo;
		use dAutoRotatePages;
		use dColorImageDownsampleType;
		use dGrayImageDownsampleType;
		use dMonoImageDownsampleType;
		use dColorImageDepth;
		use dGrayImageDepth;
		use dMonoImageDepth;
		use dColorImageFilter;
		use dGrayImageFilter;
		use dMonoImageFilter;
		use dDefaultRenderingIntent;
		use r;
		use dFIXEDRESOLUTION;
		use dNOPROMPT;
		use help;

		protected array $parameters = [];

		public static function create () : self {
			return new self();
		}

		public function setParameters (GSAPIParameter ...$parameters) : self {
			$this->parameters = array_map('trim', $parameters);

			return $this;
		}

		protected function getValue (ReflectionProperty $property) : mixed {
			$value = $property->getValue($this);
			$value = is_a($value, BackedEnum::class) ? $value->value : $value;

			if (is_bool($value)) {
				$value = $value ? 'true' : 'false';
			}

			return $value;
		}

		public function getParameters (?string $inputFile = null, ?string $outputFile = null) : array {
			$parameters = [];

			$reflection = new ReflectionClass($this);
			foreach ($reflection->getProperties() as $property) {
				if (null === $value = $this->getValue($property)) {
					continue;
				}

				if (false === $attribute = current($property->getAttributes())) {
					continue;
				}

				$attribute = $attribute->newInstance();
				switch ($attribute::class) {
					case Flag::class:
						if ($value === 'true') {
							$parameters[] = $attribute->name;
						}
						break;
					case ShortOption::class:
						$parameters[] = $attribute->name . $value;
						break;
					case Option::class:
						$parameters[] = $attribute->name . '=' . $value;
						break;
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
