[![GitHub license](https://img.shields.io/github/license/fawno/PDF-Optimizer)](https://github.com/fawno/PDF-Optimizer/blob/master/LICENSE)
[![GitHub tag (latest SemVer)](https://img.shields.io/github/v/tag/fawno/PDF-Optimizer)](https://github.com/fawno/PDF-Optimizer/tags)
[![Packagist](https://img.shields.io/packagist/v/fawno/pdf-optimizer)](https://packagist.org/packages/fawno/pdf-optimizer)
[![Packagist Downloads](https://img.shields.io/packagist/dt/fawno/pdf-optimizer)](https://packagist.org/packages/fawno/pdf-optimizer/stats)
[![GitHub issues](https://img.shields.io/github/issues/fawno/PDF-Optimizer)](https://github.com/fawno/PDF-Optimizer/issues)
[![GitHub forks](https://img.shields.io/github/forks/fawno/PDF-Optimizer)](https://github.com/fawno/PDF-Optimizer/network)
[![GitHub stars](https://img.shields.io/github/stars/fawno/PDF-Optimizer)](https://github.com/fawno/PDF-Optimizer/stargazers)

# PDF-Optimizer
PHP wrapper class for [Ghostscript API](https://ghostscript.com/doc/current/API.htm)

# Requirements
- PHP >= 8.3.0
- Ghostscript >= 9.56
- ext-ffi ([Foreign Function Interface extension](https://www.php.net/manual/en/book.ffi.php))

## Instalation

```sh
php composer.phar require "fawno/pdf-optimizer"
```

```php
<?php
  require __DIR__ . '/vendor/autoload.php';

  use Fawno\PDFOptimizer\PDFOptimizerGhostscript;
```

## Example with GS executable

```php
<?php
  require __DIR__ . '/vendor/autoload.php';

	use Fawno\Ghostscript\Ghostscript;
	use Fawno\Ghostscript\Type\GSAPIParameter;
	use Fawno\Ghostscript\Type\GSAPIParameters;
	use Fawno\PDFOptimizer\PDFOptimizerGhostscript;

	const GS_BIN = '/usr/gs/bin/gswin64c.exe';

	$params = GSAPIParameters::create(
		//GSAPIParameter::create('q'),
		GSAPIParameter::create('dSAFER'),
		GSAPIParameter::create('dBATCH'),
		GSAPIParameter::create('dNOPAUSE'),
		GSAPIParameter::create('sDEVICE', 'pdfwrite'),
		GSAPIParameter::create('dPDFSETTINGS', '/ebook'),
	);

	$gs = Ghostscript::create(GS_BIN)->set_bypass_shell(true)->set_create_process_group(true);
	$optimizer = PDFOptimizerGhostscript::create($gs);

	$code = $optimizer->optimize('original.pdf', 'optimized.pdf', $params, $stdout, $stderr);

	echo '***** OUTPUT:', PHP_EOL;
	echo $stdout, PHP_EOL;
	if ($code) {
		echo '***** ERROR:', PHP_EOL;
		echo $stderr, PHP_EOL;
	}
```

## Example with GS library

```php
<?php
  require __DIR__ . '/vendor/autoload.php';

	use Fawno\Ghostscript\GhostscriptAPI;
	use Fawno\Ghostscript\Type\GSAPIArgEncoding;
	use Fawno\Ghostscript\Type\GSAPIParameter;
	use Fawno\Ghostscript\Type\GSAPIParameters;
	use Fawno\PDFOptimizer\PDFOptimizerGhostscript;

	const GS_LIB = '/usr/gs/bin/gsdll64.dll';

	$params = GSAPIParameters::create(
		//GSAPIParameter::create('q'),
		GSAPIParameter::create('dSAFER'),
		GSAPIParameter::create('dBATCH'),
		GSAPIParameter::create('dNOPAUSE'),
		GSAPIParameter::create('sDEVICE', 'pdfwrite'),
		GSAPIParameter::create('dPDFSETTINGS', '/ebook'),
	);

	$gs = GhostscriptAPI::create(GS_LIB)->set_arg_encoding(GSAPIArgEncoding::UTF8);
	$optimizer = PDFOptimizerGhostscript::create($gs);

	$code = $optimizer->optimize('original.pdf', 'optimized.pdf', $params, $stdout, $stderr);

	echo '***** OUTPUT:', PHP_EOL;
	echo $stdout, PHP_EOL;
	if ($code) {
		echo '***** ERROR:', PHP_EOL;
		echo $stderr, PHP_EOL;
	}
```
