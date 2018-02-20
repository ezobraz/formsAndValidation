<?php
namespace app\Forms\FormElements;

use app\AbstractFormElement;

class Button extends AbstractFormElement {

    private $text;

    /**
     * Set display text
     *
     * @param str
     */
    public function setText($text) {
        $this->text = $text;
    }

	/**
	 * Get completed element
	 *
	 * @return str
	 */
    public function getElement() {
    	$tmp = '<button';

    	foreach ($this->attributes as $key => $value) {
    		if(!empty($key))
    			$tmp .= ' '.$key.'="'.$value.'"';
    	}

    	$tmp .= '>';

        $tmp .= $this->text;

        $tmp .= '</button>';

    	return $tmp;
    }

    /**
     * Set value for the element
     *
     * @param str
     */
    public function setValue($value) {
        return false;
    }
}