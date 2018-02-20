<?php
namespace app;

abstract class AbstractFormElement {

	protected $value;
    protected $validationRules = [];
    protected $attributes = [];

	/**
	 * Get completed element
	 *
	 * @return str
	 */
    abstract public function getElement();

	/**
     * Set value for the element
     *
     * @param str || array
	 */
    abstract public function setValue($value);

	/**
     * Get value of the element
     *
     * @return str || array
	 */
    public function getValue() {
    	return $this->value;
    }

    /**
     * Set validation rules for the element
     *
     * @param $rules | str || array
     */
    public function setValidationRules($rules, $text = '') {
        if(is_array($rules)) {
            $this->validationRules = $rules;
        } else {
            $this->validationRules[$rules] = $text;
        }
    }

	/**
     * Check if any validation rules was set for this element
     *
     * @param bool
	 */
    public function existsValidationRules() {
    	return (!empty($this->validationRules)) ? true : false;
    }

	/**
     * Get validation rules for this element
     *
     * @param array
	 */
    public function getValidationRules() {
    	return $this->validationRules;
    }

	/**
     * Set attributes to the element
	 *
	 * @param $attr  | str || array
	 * @param $value | str
	 */
    public function setAttributes($attr, $value = '') {
        if(is_array($attr)){
            $this->attributes = $attr;
        } else {
            $this->attributes[$attr] = $value;
        }
    }

	/**
	 * Get attribute value of the element
	 *
	 * @param $attr  | str
	 */
    public function getAttributeValue($attr) {
    	$value = (isset($this->attributes[$attr])) ? $this->attributes[$attr] : '';
        return str_replace('[]', '', $value);
    }

}