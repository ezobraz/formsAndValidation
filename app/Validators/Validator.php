<?php
namespace app\Validators;

use app\AbstractValidator;
use app\AbstractFormElement;
use app\AbstractValidationRule;

class Validator extends AbstractValidator {

	protected $requiredRules;
	protected $validationRules;
	protected $value;

	protected $errorMessages = [];

	/**
	 * Validate form element
	 *
	 * @param  $element | AbstractFormElement
	 */
	public function validate(AbstractFormElement $element) {
		
		$this->value = $this->sanitize($element->getValue());
		$this->requiredRules = $element->getValidationRules();

		foreach ($this->requiredRules as $requiredRule => $errorMessage) {
			$this->pushValidatorRule($requiredRule, $errorMessage);
		}

		$this->process();

		if(!empty($this->errorMessages))
			return false;

		return true;
	}

	/**
	 * Push validation rule objects into requiredRules array
	 *
	 * @param $rule | str - class name
	 */
	public function pushValidatorRule($rule, $errorMessage = '') {
		$rule = 'app\Validators\ValidationRules\\'.ucfirst($rule);

		$this->validationRules[] = ['object' => new $rule, 'errorMessage' => $errorMessage];
	}

	/**
	 * Process validation of the form element by all created validation rule objects
	 *
	 */
	public function process() {
		foreach ($this->validationRules as $rule) {
			if(!$rule['object']->validate($this->value))
				$this->errorMessages[] = $rule['errorMessage'];
		}
	}

	/**
	 * Get all error messages
	 *
	 * @return array
	 */
	public function getMessages() {
		return $this->errorMessages;
	}
}