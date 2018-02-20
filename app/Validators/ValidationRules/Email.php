<?php
namespace app\Validators\ValidationRules;

use app\AbstractValidationRule;

class Email extends AbstractValidationRule {

    /**
     * Validate string element
     *
     * @param $value | str
     */
    public function validate($value) {
    	if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
    		return false;
    	}

    	return true;
    }

}