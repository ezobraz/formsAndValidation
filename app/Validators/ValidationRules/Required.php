<?php
namespace app\Validators\ValidationRules;

use app\AbstractValidationRule;

class Required extends AbstractValidationRule {

    /**
     * Validate string element
     *
     * @param $value | str
     */
    public function validate($value) {
    	if($value == '' || empty($value)) {
    		return false;
    	}

    	return true;
    }

}