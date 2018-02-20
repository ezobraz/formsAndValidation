<?php
namespace app\Validators\ValidationRules;

use app\AbstractValidationRule;

class Telephone extends AbstractValidationRule {

    public $pattern = "/[^0-9]/";

    /**
     * Validate string element
     *
     * @param $value | str
     */
    public function validate($value) {
        if(preg_match($this->pattern, $value)) {
    		return false;
    	}

    	return true;
    }

}