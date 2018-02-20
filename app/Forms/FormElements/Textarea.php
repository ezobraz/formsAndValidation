<?php
namespace app\Forms\FormElements;

use app\AbstractFormElement;

class Textarea extends AbstractFormElement {

    private $text;

    /**
     * Set textarea text
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
    	$tmp = '<textarea';

    	foreach ($this->attributes as $key => $value) {
    		if(!empty($key))
    			$tmp .= ' '.$key.'="'.$value.'"';
    	}

    	$tmp .= '>';

        $tmp .= $this->text;

        $tmp .= '</textarea>';

    	return $tmp;
    }

    /**
     * Set value for the element
     *
     * @param str
     */
    public function setValue($value) {
        $this->value = $value;
        $this->setText($value);
    }

}