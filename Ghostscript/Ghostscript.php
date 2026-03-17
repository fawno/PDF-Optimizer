<?php
  declare(strict_types=1);

	namespace Fawno\Ghostscript;

	class Ghostscript {
		protected ?string $run_cwd = null;
		protected ?array $run_env_vars = null;
		protected ?array $run_options = null;

		protected function __construct (protected string $gsbin_path) {
		}

		public static function create (string $gsbin_path) : self|false {
			if (!is_file($gsbin_path)) {
				return false;
			}

			return new self($gsbin_path);
		}

		public function set_run_cwd (?string $cwd) : self {
			$this->run_cwd = $cwd;

			return $this;
		}

		public function set_env_vars (?array $env_vars) : self {
			$this->run_env_vars = $env_vars;

			return $this;
		}

		public function clear_run_options () : self {
			$this->run_options = null;

			return $this;
		}

		private function set_run_option (string $option, ?bool $value) : self {
			if (is_null($value)) {
				unset($this->run_options[$option]);
				if (empty($this->run_options)) {
					$this->run_options = null;
				}
			} else {
				$this->run_options[$option] = $value;
			}

			return $this;
		}

		public function set_suppress_errors (?bool $value) : self {
			return $this->set_run_option('suppress_errors', $value);
		}

		public function set_bypass_shell (?bool $value) : self {
			return $this->set_run_option('bypass_shell', $value);
		}

		public function set_blocking_pipes (?bool $value) : self {
			return $this->set_run_option('blocking_pipes', $value);
		}

		public function set_create_process_group (?bool $value) : self {
			return $this->set_run_option('create_process_group', $value);
		}

		public function set_create_new_console (?bool $value) : self {
			return $this->set_run_option('create_new_console', $value);
		}

		/**
		 * Run GS with params
		 *
		 * @param array $arguments
		 * @param null|string &$stdout
		 * @param null|string &$stderr
		 * @return GhostscriptReturnCodes
		 */
		public function run (array $arguments, ?string &$stdout, ?string &$stderr, ?string $stdin = null) : GhostscriptReturnCodes {
			$arguments = implode(' ', $arguments);
			$cmd = $this->gsbin_path . ' ' . $arguments;

			$descriptorspec = [
				['pipe', 'r'],
				['pipe', 'w'],
				['pipe', 'w'],
			];

			if (false === $process = proc_open($cmd, $descriptorspec, $pipes, $this->run_cwd, $this->run_env_vars, $this->run_options)) {
				return GhostscriptReturnCodes::PROC_OPEN;
			}

			if ($stdin) {
				fwrite($pipes[0], $stdin);
				fclose($pipes[0]);
			}

			do {
				sleep(1);
				$status = proc_get_status($process);
			} while ($status['running']);

			$stdout = stream_get_contents($pipes[1]);
			$stderr = stream_get_contents($pipes[2]);

			return GhostscriptReturnCodes::fromExitCode(proc_close($process));
		}
	}
