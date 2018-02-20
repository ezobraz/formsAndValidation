<?php
namespace app;

abstract class AbstractValidator {

	static protected $data;

	/**
	 * Validate form element
	 *
	 * @param  $element | AbstractFormElement
	 */
	abstract public function validate(AbstractFormElement $element);

	/**
	 * Get value from post by key
	 *
	 * @return str
	 */
	static public function getValueByKey($name) {
		if(isset(self::$data[$name]))
			return self::$data[$name];

		return '';
	}

	/**
	 * Collect data from array (POST)
	 *
	 * @param $data | array
	 * @return str
	 */
	static public function collectData($data) {
		if(!empty($data))
			self::$data = $data;
	}

	/**
	 * Get all collected data
	 *
	 * @return array
	 */
	static public function getData() {
		return self::$data;
	}

	/**
	 * Sanitize value
	 *
	 * @param $value | str || array
	 * @return str || array
	 */
	static public function sanitize($value) {
		if(is_array($value)) {
			$value = array_map(function($str) {
				return htmlspecialchars($str, ENT_COMPAT, 'utf-8');
			}, $value);
		} else {
			$value = htmlspecialchars($value, ENT_COMPAT, 'utf-8');
		}

		return $value;
	}
}