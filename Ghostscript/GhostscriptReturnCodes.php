<?php
	declare(strict_types=1);

	namespace Fawno\Ghostscript;

	use RuntimeException;

	enum GhostscriptReturnCodes : int {

		/* -----------------------------------------------------------------
		 * PostScript interpreter errors
		 * ----------------------------------------------------------------- */

		case OK                     =    0;
		case UNKNOWN_ERROR          =   -1;
		case DICT_FULL              =   -2;
		case DICT_STACK_OVERFLOW    =   -3;
		case DICT_STACK_UNDERFLOW   =   -4;
		case EXEC_STACK_OVERFLOW    =   -5;
		case INTERRUPT              =   -6;
		case INVALID_ACCESS         =   -7;
		case INVALID_EXIT           =   -8;
		case INVALID_FILE_ACCESS    =   -9;
		case INVALID_FONT           =  -10;
		case INVALID_RESTORE        =  -11;
		case IO_ERROR               =  -12;
		case LIMIT_CHECK            =  -13;
		case NO_CURRENT_POINT       =  -14;
		case RANGE_CHECK            =  -15;
		case STACK_OVERFLOW         =  -16;
		case STACK_UNDERFLOW        =  -17;
		case SYNTAX_ERROR           =  -18;
		case TIMEOUT                =  -19;
		case TYPE_CHECK             =  -20;
		case UNDEFINED              =  -21;
		case UNDEFINED_FILENAME     =  -22;
		case UNDEFINED_RESULT       =  -23;
		case UNMATCHED_MARK         =  -24;
		case VM_ERROR               =  -25;

		/* -----------------------------------------------------------------
		 * Additional Level 2 errors
		 * ----------------------------------------------------------------- */

		case CONFIGURATION_ERROR    =  -26;
		case UNDEFINED_RESOURCE     =  -27;

		case UNREGISTERED           =  -28;
		case INVALID_CONTEXT        =  -29;
		case INVALID_ID             =  -30;

		/* -----------------------------------------------------------------
		 * PDF interpreter errors
		 * ----------------------------------------------------------------- */

		case PDF_STACK_OVERFLOW     =  -31;
		case CIRCULAR_REFERENCE     =  -32;

		/* -----------------------------------------------------------------
		 * Internal / pseudo errors
		 * ----------------------------------------------------------------- */

		case HIT_DETECTED           =  -99;
		case FATAL_ERROR            = -100;
		case QUIT                   = -101;
		case INTERPRETER_EXIT       = -102;
		case REMAP_COLOR            = -103;
		case EXEC_STACK_UNDERFLOW   = -104;
		case VM_RECLAIM             = -105;
		case NEED_INPUT             = -106;
		case NEED_FILE              = -107;
		case INFO                   = -110;
		case HANDLED                = -111;
		case PROC_OPEN              = -999;

		/* -----------------------------------------------------------------
		 * Factory
		 * ----------------------------------------------------------------- */

		public static function fromExitCode (int $code) : self {
			return self::tryFrom($code) ?? self::UNKNOWN_ERROR;
		}

		/* -----------------------------------------------------------------
		 * Classification helpers
		 * ----------------------------------------------------------------- */

		public function isError () : bool {
			return ($this->category() != 'success');
		}

		public function isInternal () : bool {
			return $this->value < -100;
		}

		public function category () : string {
			return match (true) {
				$this === self::OK                     => 'success',
				$this === self::QUIT                   => 'success',
				$this === self::INFO                   => 'success',
				$this->value >= -25                    => 'postscript',
				$this->value >= -30                    => 'postscript-level2',
				$this->value >= -32                    => 'pdf',
				$this->value <= -101                   => 'internal',
				default                                => 'unknown',
			};
		}

		/* -----------------------------------------------------------------
		 * Human readable info
		 * ----------------------------------------------------------------- */

		public function postScriptName () : string {
			return match ($this) {
				self::OK                   => 'gs_error_ok',
				self::UNKNOWN_ERROR        => 'gs_error_unknownerror',
				self::DICT_FULL            => 'gs_error_dictfull',
				self::DICT_STACK_OVERFLOW  => 'gs_error_dictstackoverflow',
				self::DICT_STACK_UNDERFLOW => 'gs_error_dictstackunderflow',
				self::EXEC_STACK_OVERFLOW  => 'gs_error_execstackoverflow',
				self::INTERRUPT            => 'gs_error_interrupt',
				self::INVALID_ACCESS       => 'gs_error_invalidaccess',
				self::INVALID_EXIT         => 'gs_error_invalidexit',
				self::INVALID_FILE_ACCESS  => 'gs_error_invalidfileaccess',
				self::INVALID_FONT         => 'gs_error_invalidfont',
				self::INVALID_RESTORE      => 'gs_error_invalidrestore',
				self::IO_ERROR             => 'gs_error_ioerror',
				self::LIMIT_CHECK          => 'gs_error_limitcheck',
				self::NO_CURRENT_POINT     => 'gs_error_nocurrentpoint',
				self::RANGE_CHECK          => 'gs_error_rangecheck',
				self::STACK_OVERFLOW       => 'gs_error_stackoverflow',
				self::STACK_UNDERFLOW      => 'gs_error_stackunderflow',
				self::SYNTAX_ERROR         => 'gs_error_syntaxerror',
				self::TIMEOUT              => 'gs_error_timeout',
				self::TYPE_CHECK           => 'gs_error_typecheck',
				self::UNDEFINED            => 'gs_error_undefined',
				self::UNDEFINED_FILENAME   => 'gs_error_undefinedfilename',
				self::UNDEFINED_RESULT     => 'gs_error_undefinedresult',
				self::UNMATCHED_MARK       => 'gs_error_unmatchedmark',
				self::VM_ERROR             => 'gs_error_VMerror',

				self::CONFIGURATION_ERROR  => 'gs_error_configurationerror',
				self::UNDEFINED_RESOURCE   => 'gs_error_undefinedresource',
				self::UNREGISTERED         => 'gs_error_unregistered',
				self::INVALID_CONTEXT      => 'gs_error_invalidcontext',
				self::INVALID_ID           => 'gs_error_invalidid',

				self::PDF_STACK_OVERFLOW   => 'gs_error_pdf_stackoverflow',
				self::CIRCULAR_REFERENCE   => 'gs_error_circular_reference',

				self::HIT_DETECTED         => 'gs_error_hit_detected',

				self::FATAL_ERROR          => 'gs_error_Fatal',
				self::QUIT                 => 'gs_error_Quit',
				self::INTERPRETER_EXIT     => 'gs_error_InterpreterExit',
				self::REMAP_COLOR          => 'gs_error_Remap_Color',
				self::EXEC_STACK_UNDERFLOW => 'gs_error_ExecStackUnderflow',
				self::VM_RECLAIM           => 'gs_error_VMreclaim',
				self::NEED_INPUT           => 'gs_error_NeedInput',
				self::NEED_FILE            => 'gs_error_NeedFile',
				self::INFO                 => 'gs_error_Info',
				self::HANDLED              => 'gs_error_handled',
			};
		}

		public function description () : string {
			return match ($this) {
				self::OK                   => 'Execution completed successfully.',
				self::UNKNOWN_ERROR        => 'Unknown interpreter error.',
				self::DICT_FULL            => 'Dictionary is full.',
				self::DICT_STACK_OVERFLOW  => 'Dictionary stack overflow.',
				self::DICT_STACK_UNDERFLOW => 'Dictionary stack underflow.',
				self::EXEC_STACK_OVERFLOW  => 'Execution stack overflow.',
				self::INTERRUPT            => 'Execution interrupted.',
				self::INVALID_ACCESS       => 'Invalid memory access.',
				self::INVALID_EXIT         => 'Invalid exit operation.',
				self::INVALID_FILE_ACCESS  => 'Invalid file access.',
				self::INVALID_FONT         => 'Invalid font.',
				self::INVALID_RESTORE      => 'Invalid restore operation.',
				self::IO_ERROR             => 'Input/output error.',
				self::LIMIT_CHECK          => 'Limit exceeded.',
				self::NO_CURRENT_POINT     => 'No current point defined.',
				self::RANGE_CHECK          => 'Range check error.',
				self::STACK_OVERFLOW       => 'Operand stack overflow.',
				self::STACK_UNDERFLOW      => 'Operand stack underflow.',
				self::SYNTAX_ERROR         => 'Syntax error.',
				self::TIMEOUT              => 'Execution timeout.',
				self::TYPE_CHECK           => 'Type mismatch.',
				self::UNDEFINED            => 'Undefined name.',
				self::UNDEFINED_FILENAME   => 'Undefined file name.',
				self::UNDEFINED_RESULT     => 'Undefined result.',
				self::UNMATCHED_MARK       => 'Unmatched mark on stack.',
				self::VM_ERROR             => 'Virtual memory error.',

				default => 'Internal Ghostscript interpreter condition.',
			};
		}

		/* -----------------------------------------------------------------
		 * Exception helper
		 * ----------------------------------------------------------------- */

		public function throw () : void {
			if ($this->isError()) {
				throw new RuntimeException(
					sprintf(
						'Ghostscript error %d (%s): %s',
						$this->value,
						$this->name,
						$this->description(),
					)
				);
			}
		}
	}
