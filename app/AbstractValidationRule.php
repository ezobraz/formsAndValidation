<?php
namespace app;

abstract class AbstractValidationRule {

	protected $errorMessage;

	/**
	 * Validate string element
	 *
	 * @param $value | str
	 */
	abstract public function validate($value);
}