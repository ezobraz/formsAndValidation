<?php
namespace app;

abstract class AbstractForm {

    protected $attributes = [];
    protected $elements = [];

	/**
	 * Build form with existing attributes
	 *
	 */
    abstract public function buildForm();

	/**
     * Check if post data was send and if it was, then launch validation process
	 *
	 */
    abstract public function process();

	/**
	 * Get completed form
	 *
	 * @return str
	 */
    abstract public function getForm();

	/**
	 * Set attributes to the form
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
	 * Get attribute value of the form
	 *
	 * @param $attr | str
	 */
    public function getAttributeValue($attr) {
    	return (isset($this->attributes[$attr])) ? $this->attributes[$attr] : '';
    }

	/**
	 * Push element to the form
	 *
	 * @param $element | AbstractFormElement
	 */
    public function pushElement(AbstractFormElement $element) {
    	$this->elements[] = $element;
    }

}