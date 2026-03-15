<?php
  declare(strict_types=1);

	namespace Fawno\Ghostscript;

	use Fawno\Ghostscript\Type\GSAPIArgEncoding;
	use Fawno\Ghostscript\Type\GSAPIParameters;
	use Fawno\Ghostscript\Type\GSAPIRevision;
	use FFI;
	use FFI\CData;

	class GhostscriptAPI {
		protected const HEADER = <<<EOT
			typedef struct gsapi_revision_s { const char *product; const char *copyright; long revision; long revisiondate; } gsapi_revision_t;
			typedef struct display_callback_s display_callback;
			typedef struct gs_memory_s gs_memory_t;
			typedef struct gp_file_s gp_file;
			typedef int (*gs_callout)(void *instance, void *callout_handle, const char *device_name, int id, int size, void *data);
			typedef enum {
				gs_spt_invalid = -1,
				gs_spt_null    = 0,   /* void * is NULL */
				gs_spt_bool    = 1,   /* void * is a pointer to an int (0 false, non-zero true). */
				gs_spt_int     = 2,   /* void * is a pointer to an int */
				gs_spt_float   = 3,   /* void * is a float * */
				gs_spt_name    = 4,   /* void * is a char * */
				gs_spt_string  = 5,   /* void * is a char * */
				gs_spt_long    = 6,   /* void * is a long * */
				gs_spt_i64     = 7,   /* void * is an int64_t * */
				gs_spt_size_t  = 8,   /* void * is a size_t * */
				gs_spt_parsed  = 9,   /* void * is a pointer to a char * to be parsed */

				/* Setting a typed param causes it to be instantly fed to to the
				* device. This can cause the device to reinitialise itself. Hence,
				* setting a sequence of typed params can cause the device to reset
				* itself several times. Accordingly, if you OR the type with
				* gs_spt_more_to_come, the param will held ready to be passed into
				* the device, and will only actually be sent when the next typed
				* param is set without this flag (or on device init). Not valid
				* for get_typed_param. */
				gs_spt_more_to_come = 1<<31
			} gs_set_param_type;
			typedef struct {
					int (*open_file)(const gs_memory_t *mem,
																void        *secret,
													const char        *fname,
													const char        *mode,
																gp_file    **file);
					int (*open_pipe)(const gs_memory_t *mem,
																void        *secret,
													const char        *fname,
																char        *rfname, /* 4096 bytes */
													const char        *mode,
																gp_file    **file);
					int (*open_scratch)(const gs_memory_t *mem,
																		void        *secret,
															const char        *prefix,
																		char        *rfname, /* 4096 bytes */
															const char        *mode,
																		int          rm,
																		gp_file    **file);
					int (*open_printer)(const gs_memory_t *mem,
																		void        *secret,
																		char        *fname, /* 4096 bytes */
																		int          binary,
																		gp_file    **file);
					int (*open_handle)(const gs_memory_t *mem,
																	void        *secret,
																	char        *fname, /* 4096 bytes */
														const char        *mode,
																	gp_file    **file);
			} gsapi_fs_t;

			int gsapi_revision (gsapi_revision_t *pr, int len);
			int gsapi_new_instance (void **pinstance, void *caller_handle);
			void gsapi_delete_instance (void *instance);
			int gsapi_set_stdio_with_handle (void *instance, int(*stdin_fn)(void *caller_handle, char *buf, int len), int(*stdout_fn)(void *caller_handle, const char *str, int len), int(*stderr_fn)(void *caller_handle, const char *str, int len), void *caller_handle);
			int gsapi_set_stdio (void *instance, int(*stdin_fn)(void *caller_handle, char *buf, int len), int(*stdout_fn)(void *caller_handle, const char *str, int len), int(*stderr_fn)(void *caller_handle, const char *str, int len));
			int gsapi_set_arg_encoding (void *instance, int encoding);
			int gsapi_run_string_begin (void *instance, int user_errors, int *pexit_code);
			int gsapi_run_string_continue (void *instance, const char *str, unsigned int length, int user_errors, int *pexit_code);
			int gsapi_run_string_end (void *instance, int user_errors, int *pexit_code);
			int gsapi_run_string_with_length (void *instance, const char *str, unsigned int length, int user_errors, int *pexit_code);
			int gsapi_run_string (void *instance, const char *str, int user_errors, int *pexit_code);
			int gsapi_run_file (void *instance, const char *file_name, int user_errors, int *pexit_code);
			int gsapi_init_with_args (void *instance, int argc, char **argv);
			int gsapi_exit (void *instance);
			int gsapi_set_param(void *instance, const char *param, const void *value, gs_set_param_type type);
			int gsapi_get_param(void *instance, const char *param, void *value, gs_set_param_type type);
			int gsapi_enumerate_params(void *instance, void **iter, const char **key, gs_set_param_type *type);
			int gsapi_add_control_path(void *instance, int type, const char *path);
			int gsapi_remove_control_path(void *instance, int type, const char *path);
			void gsapi_purge_control_paths(void *instance, int type);
			void gsapi_activate_path_control(void *instance, int enable);
			int gsapi_is_path_control_active(void *instance);
			int gsapi_add_fs (void *instance, gsapi_fs_t *fs, void *secret);
			void gsapi_remove_fs (void *instance, gsapi_fs_t *fs, void *secret);
		EOT;

		protected ?CData $instance = null;
		protected GSAPIArgEncoding $encoding = GSAPIArgEncoding::Local;

		protected function __construct (protected FFI $ffi) {
		}

		public static function create (string $lib_path) : self|false {
			if (!is_file($lib_path)) {
				return false;
			}

			$ffi = FFI::cdef(self::HEADER, $lib_path);

			return new self($ffi);
		}

		public function set_arg_encoding (GSAPIArgEncoding $encoding) : self {
			$this->encoding = $encoding;

			return $this;
		}

		/**
		 * Run GS with params
		 *
		 * @param GSAPIParameters $arguments
		 * @param null|string &$stdout
		 * @param null|string &$stderr
		 * @return int
		 */
		public function run (GSAPIParameters $arguments, ?string &$stdout, ?string &$stderr) : int {
			$stdout = '';
			$stderr = '';

			$this->gsapi_new_instance();

			$this->gsapi_set_stdio(
				null,
				function(mixed $caller, string $buffer, int $len) use (&$stdout) : int {
					$stdout .= substr($buffer, 0, $len);
					return $len;
				},
				function(mixed $caller, string $buffer, int $len) use (&$stderr)  : int {
					$stderr .= substr($buffer, 0, $len);
					return $len;
				},
			);

			$this->gsapi_set_arg_encoding($this->encoding);
			$code = $this->gsapi_init_with_args($arguments);

			$this->gsapi_exit();
			$this->gsapi_delete_instance();

			return $code;
		}

		protected function argsPtr(array $argv): ?CData {
			$argv = array_values($argv);
			$argc = count($argv);

			if (!$argc) {
				return null;
			}

			$p = $this->ffi->new("char *[$argc]", false);
			foreach ($argv as $i => $arg) {
				$p[$i] = self::strToCharPtr($arg);
			}
			$a = FFI::addr($p);

			return $this->ffi->cast('char**', $a);
		}

		protected function strToCharPtr(string $string): CData {
			$charArr = self::strToCharArr($string);

			return $this->ffi->cast('char*', FFI::addr($charArr));
		}

		protected function strToCharArr(string $string): CData {
			$string = preg_replace('~[\x00]+$~', "\x00", $string . "\x00");
			$len = strlen($string);

			if (!$len) {
				return $this->ffi->new('char', false);
			}

			$charArr = $this->ffi->new("char[$len]", false);

			foreach ($charArr as $i => $char) {
				$charArr[$i]->cdata = $string[$i];
			}


			return $charArr;
		}

		/**
		 * Get version numbers and strings.
		 *
		 * This is safe to call at any time.
		 * You should call this first to make sure that the correct version
		 * of the Ghostscript is being used.
		 *
		 * Returns 0 if OK, or if len too small (additional parameters
		 * have been added to the structure) it will return the required
		 * size of the structure.
		 *
		 * @return GSAPIRevision|int
		 */
		public function gsapi_revision () : GSAPIRevision|int {
			$gsapi_revision = $this->ffi->new('gsapi_revision_t');

			$code = $this->ffi->gsapi_revision(FFI::addr($gsapi_revision), FFI::sizeof($gsapi_revision));

			return $code ?: GSAPIRevision::create($gsapi_revision);
		}

		/**
		 * Create a new instance of Ghostscript.
		 *
		 * @return int
		 */
		public function gsapi_new_instance () : int {
			$this->instance = $this->ffi->new('void *');

			return $this->ffi->gsapi_new_instance(FFI::addr($this->instance), null);
		}

		/**
		 * Destroy an instance of Ghostscript
		 *
		 * Before you call this, Ghostscript must have finished.
		 * If Ghostscript has been initialised, you must call gsapi_exit()
		 * before gsapi_delete_instance.
		 *
		 * @return void
		 */
		public function gsapi_delete_instance () : void {
			$this->ffi->gsapi_delete_instance($this->instance);
			$this->instance = null;
		}

		/**
		 * Set the callback functions for stdio
		 *
		 * The stdin callback function should return the number of
		 * characters read, 0 for EOF, or -1 for error.
		 * The stdout and stderr callback functions should return
		 * the number of characters written.
		 * If a callback address is NULL, the real stdio will be used.
		 *
		 * @param object $stdin_fn function(mixed $caller_handle, string $buffer, int $len) {}
		 * @param object $stdout_fn function(mixed $caller_handle, string $buffer, int $len) { return $len; }
		 * @param object $stderr_fn function(mixed $caller_handle, string $buffer, int $len) { return $len; }
		 * @return int
		 */
		public function gsapi_set_stdio (?object $stdin_fn = null, ?object $stdout_fn = null, ?object $stderr_fn = null) : int  {
			return $this->ffi->gsapi_set_stdio($this->instance, $stdin_fn, $stdout_fn, $stderr_fn);
		}

		/**
		 * Set the encoding used for the args.
		 *
		 * Set the encoding used for the args. By default we assume
		 * 'local' encoding. For windows this equates to whatever the current
		 * codepage is. For linux this is utf8.
		 *
		 * Use of this API (gsapi) with 'local' encodings (and hence without calling
		 * this function) is now deprecated!
		 *
		 * @param GSAPIArgEncoding $encoding
		 * @return int
		 */
		public function gsapi_set_arg_encoding (GSAPIArgEncoding $encoding) : int {
			return $this->ffi->gsapi_set_arg_encoding($this->instance, $encoding->value);
		}

		/**
		 * Initialise the interpreter.
		 *
		 * This calls gs_main_init_with_args() in imainarg.c
		 * 1. If quit or EOF occur during gsapi_init_with_args(),
		 *    the return value will be gs_error_Quit.  This is not an error.
		 *    You must call gsapi_exit() and must not call any other
		 *    gsapi_XXX functions.
		 * 2. If usage info should be displayed, the return value will be gs_error_Info
		 *    which is not an error.  Do not call gsapi_exit().
		 * 3. Under normal conditions this returns 0.  You would then
		 *    call one or more gsapi_run_*() functions and then finish
		 *    with gsapi_exit().
		 *
		 * @param GSAPIParameters $arguments
		 * @return int
		 */
		public function gsapi_init_with_args (GSAPIParameters $arguments) : int {
			//$arguments = array_merge(['', '-dSAFER', '-dBATCH', '-dNOPAUSE'], $arguments->getParameters());
			$arguments = $arguments->getParameters();
			array_unshift($arguments, '');
			$argc = count($arguments);
			$argv = $this->argsPtr($arguments);

			return $this->ffi->gsapi_init_with_args($this->instance, $argc, $argv);
		}

		/**
		 * Exit the interpreter.
		 *
		 * This must be called on shutdown if gsapi_init_with_args()
		 * has been called, and just before gsapi_delete_instance().
		 *
		 * @return int
		 */
		public function gsapi_exit () : int {
			return $this->ffi->gsapi_exit($this->instance);
		}
	}
