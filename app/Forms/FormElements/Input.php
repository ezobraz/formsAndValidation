<?php
namespace app\Forms\FormElements;

use app\AbstractFormElement;

class Input extends AbstractFormElement {

	/**
	 * Get completed element
	 *
	 * @return str
	 */
    public function getElement() {
    	$tmp = '<input';

    	foreach ($this->attributes as $key => $value) {
    		if(!empty($key))
    			$tmp .= ' '.$key.'="'.$value.'"';
    	}

    	$tmp .= '>';

    	return $tmp;
    }

    /**
     * Set value for the element
     *
     * @param str
     */
    public function setValue($value) {
        $this->value = $value;
        $this->setAttributes('value', $value);
    }

}