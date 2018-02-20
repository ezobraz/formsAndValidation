<?php
namespace app\Forms\FormElements;

use app\AbstractFormElement;

class Select extends AbstractFormElement {

    private $options;

    /**
     * Set display text
     *
     * @param str
     */
    public function setOption($value, $text, $isSelected = false) {
        $this->options[$value] = [
            'text' => $text, 
            'selected' => ($isSelected) ? 'selected' : ''
        ];
    }

    /**
     * Select option by key
     *
     * @param str
     */
    public function selectOption($keyValue) {
        if(!empty($this->options[$keyValue]))
            $this->options[$keyValue]['selected'] = 'selected';
    }

	/**
	 * Get completed element
	 *
	 * @return str
	 */
    public function getElement() {
    	$tmp = '<select';

    	foreach ($this->attributes as $key => $value) {
    		if(!empty($key))
    			$tmp .= ' '.$key.'="'.$value.'"';
    	}

    	$tmp .= '>';

        foreach ($this->options as $keyValue => $option) {
            $tmp .= '<option value="'.$keyValue.'" '.$option['selected'].'>'.$option['text'].'</option>';
        }

        $tmp .= '</select>';

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
            foreach ($value as $strVal) {
                $this->selectOption($strVal);
            }
        } else {
            $this->selectOption($value);
        }
    }

}