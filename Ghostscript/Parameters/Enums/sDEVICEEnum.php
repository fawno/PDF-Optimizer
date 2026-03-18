<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript\Parameters\Enums;

	/**
	 * Ghostscript Devices
	 *
	 * https://www.gnu.org/software/ghostscript/devices.html
	 */
	enum sDEVICEEnum : string {
		/**
		 * High-level (vector) file formats
		 */

		/** The eps2write device outputs encapsulated postscript. */
		case EPSWRITE = 'eps2write';
		/** The pdfwrite device outputs PDF. */
		case PDFWRITE = 'pdfwrite';
		/** The ps2write device outputs postscript language level 2. It is recommnded that this device is used for PostScript output. There is no longer any support for creating PostScript level 1 output. */
		case PSWRITE = 'ps2write';
		/** The pxlmono and pxlcolor devices output HP PCL-XL, a graphic language understood by many recent laser printers. */
		case PXLMONO = 'pxlmono';
		/** Color PCL XL */
		case PXLCOLOR = 'pxlcolor';
		/** The txtwrite device will output the text contained in the original document as Unicode. */
		case TXTWRITE = 'txtwrite';

		/**
		 * Other raster file formats and devices
		 */

		/** Plain bits, monochrome */
		case BIT = 'bit';
		/** Plain bits, RGB */
		case BITRGB = 'bitrgb';
		/** Plain bits, CMYK */
		case BITCMYK = 'bitcmyk';
		/** Monochrome MS Windows .BMP file format */
		case BMPMONO = 'bmpmono';
		/** 8-bit gray .BMP file format */
		case BMPGRAY = 'bmpgray';
		/** Separated 1-bit CMYK .BMP file format, primarily for testing */
		case BMPSEP1 = 'bmpsep1';
		/** Separated 8-bit CMYK .BMP file format, primarily for testing */
		case BMPSEP8 = 'bmpsep8';
		/** 4-bit (EGA/VGA) .BMP file format */
		case BMP4 = 'bmp16';
		/** 8-bit (256-color) .BMP file format */
		case BMP8 = 'bmp256';
		/** 24-bit .BMP file format */
		case BMP24 = 'bmp16m';
		/** 32-bit pseudo-.BMP file format */
		case BMP32 = 'bmp32b';
		/** Monochrome (black-and-white) CGM -- LOW LEVEL OUTPUT ONLY */
		case CGMMONO = 'cgmmono';
		/** 8-bit (256-color) CGM -- DITTO */
		case CGM8 = 'cgm8';
		/** 24-bit color CGM -- DITTO */
		case CGM24 = 'cgm24';
		/** JPEG format, RGB output */
		case JPEG = 'jpeg';
		/** JPEG format, gray output */
		case JPEGGRAY = 'jpeggray';
		/** ImageMagick MIFF format, 24-bit direct color, RLE compressed */
		case MIFF = 'miff24';
		/** PCX file format, monochrome (1-bit black and white) */
		case PCXMONO = 'pcxmono';
		/** PCX file format, 8-bit gray scale */
		case PCXGRAY = 'pcxgray';
		/** PCX file format, 4-bit planar (EGA/VGA) color */
		case PCX4 = 'pcx16';
		/** PCX file format, 8-bit chunky color */
		case PCX8 = 'pcx256';
		/** PCX file format, 24-bit color (3 8-bit planes) */
		case PCX24 = 'pcx24b';
		/** PCX file format, 4-bit chunky CMYK color */
		case PCXCMYK = 'pcxcmyk';
		/** Portable Bitmap (plain format) */
		case PBM = 'pbm';
		/** Portable Bitmap (raw format) */
		case PBMRAW = 'pbmraw';
		/** Portable Graymap (plain format) */
		case PGM = 'pgm';
		/** Portable Graymap (raw format) */
		case PGMRAW = 'pgmraw';
		/** Portable Graymap (plain format), optimizing to PBM if possible */
		case PGNM = 'pgnm';
		/** Portable Graymap (raw format), optimizing to PBM if possible */
		case PGNMRAW = 'pgnmraw';
		/** Portable Pixmap (plain format) (RGB), optimizing to PGM or PBM if possible */
		case PNM = 'pnm';
		/** Portable Pixmap (raw format) (RGB), optimizing to PGM or PBM if possible */
		case PNMRAW = 'pnmraw';
		/** Portable Pixmap (plain format) (RGB) */
		case PPM = 'ppm';
		/** Portable Pixmap (raw format) (RGB) */
		case PPMRAW = 'ppmraw';
		/** Portable inKmap (plain format) (4-bit CMYK => RGB) */
		case PKM = 'pkm';
		/** Portable inKmap (raw format) (4-bit CMYK => RGB) */
		case PKMRAW = 'pkmraw';
		/** Portable Separated map (plain format) (4-bit CMYK => 4 pages) */
		case PKSM = 'pksm';
		/** Portable Separated map (raw format) (4-bit CMYK => 4 pages) */
		case PKSMRAW = 'pksmraw';
		/** Plan 9 bitmap format */
		case PLAN9BM = 'plan9bm';
		/** Monochrome Portable Network Graphics (PNG) */
		case PNGMONO = 'pngmono';
		/** 8-bit gray Portable Network Graphics (PNG) */
		case PNGGRAY = 'pnggray';
		/** 4-bit color Portable Network Graphics (PNG) */
		case PNG4 = 'png16';
		/** 8-bit color Portable Network Graphics (PNG) */
		case PNG8 = 'png256';
		/** 24-bit color Portable Network Graphics (PNG) */
		case PNG24 = 'png16m';
		/** PostScript (Level 1) monochrome image */
		case PSMONO = 'psmono';
		/** PostScript (Level 1) 8-bit gray image */
		case PSGRAY = 'psgray';
		/** PostScript (Level 2) 24-bit color image */
		case PSRGB = 'psrgb';

		/**
		 * TIFF file formats
		 */

		/** TIFF: Produces 8-bit gray output. */
		case TIFFGRAY = 'tiffgray';
		/** TIFF: Produces 12-bit RGB output (4 bits per component). */
		case TIFF12NC = 'tiff12nc';
		/** TIFF: Produces 24-bit RGB output (8 bits per component). */
		case TIFF24NC = 'tiff24nc';
		/** TIFF: Produces 48-bit RGB output (16 bits per component). */
		case TIFF48NC = 'tiff48nc';
		/** TIFF: Produces 32-bit CMYK output (8 bits per component). */
		case TIFF32NC = 'tiff32nc';
		/** TIFF: Produces 64-bit CMYK output (16 bits per component). */
		case TIFF64NC = 'tiff64nc';
		/** TIFF: LZW-compatible (tag = 5) compression. */
		case TIFFLZW = 'tifflzw';
		/** TIFF: PackBits (tag = 32773) compression. */
		case TIFFPACK = 'tiffpack';
		/** TIFF: Sep */
		case TIFFSEP = 'tiffsep';
		/** TIFF: tiffsep1 */
		case TIFFSEP1 = 'tiffsep1';
		/** TIFF: tiffscaled */
		case TIFFSCALED = 'tiffscaled';
		/** TIFF: tiffscaled4 */
		case TIFFSCALED4 = 'tiffscaled4';
		/** TIFF: tiffscaled8 */
		case TIFFSCALED8 = 'tiffscaled8';
		/** TIFF: tiffscaled24 */
		case TIFFSCALED24 = 'tiffscaled24';
		/** TIFF: tiffscaled32 */
		case TIFFSCALED32 = 'tiffscaled32';
		/** TIFF: G3 fax encoding with no EOLs. */
		case TIFFCRLE = 'tiffcrle';
		/** TIFF: G3 fax encoding with EOLs. */
		case TIFFG3 = 'tiffg3';
		/** TIFF: 2-D G3 fax encoding. */
		case TIFFG32D = 'tiffg32d';
		/** TIFF: G4 fax encoding. */
		case TIFFG4 = 'tiffg4';
	}
