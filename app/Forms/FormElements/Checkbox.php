<?php
namespace app\Forms\FormElements;

use app\AbstractFormElement;

class Checkbox extends AbstractFormElement {

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
    	$tmp = '<label>';
        $tmp .= '<input type="checkbox"';

    	foreach ($this->attributes as $key => $value) {
    		if(!empty($key))
    			$tmp .= ' '.$key.'="'.$value.'"';
    	}

    	$tmp .= '>';

        $tmp .= $this->text;

        $tmp .= '</label>';

    	return $tmp;
    }

    /**
     * Set value for the element
     *
     * @param str || array
     */
    public function setValue($value) {
        $this->value = $value;
        if(is_array($value)) {
            if(in_array($this->getAttributeValue('value'), $value)) {
                $this->setAttributes('checked');
            }
        } else {
            if($this->getAttributeValue('value') == $value) {
                $this->setAttributes('checked');
            }
        }
    }

}