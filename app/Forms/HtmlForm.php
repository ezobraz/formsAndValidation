<?php
namespace app\Forms;

use app\AbstractForm;
use app\Validators\Validator;
use app\Forms\FormElements\Input;

class HtmlForm extends AbstractForm {

    private $messages;

    private $formName;
	private $start;
	private $end;

    /**
     * Creates unique hidden input for this form so we can define which form was submited
     *
     */
    public function __construct($name) {
        $this->formName = $name;
        $uniqueHiddenInput = new Input();
        $uniqueHiddenInput->setAttributes(['type' => 'hidden', 'name' => $this->formName]);
        $this->pushElement($uniqueHiddenInput);
    }

    /**
     * Check if post data was sent and if it was, then launch validation process
     *
     */
    public function process() {

        switch (strtolower($this->getAttributeValue('method'))) {
            case 'get':
                $formSumbitData = $_GET;
                break;

            case 'post':
                $formSumbitData = $_POST;
                break;
            
            default:
                $formSumbitData = $_POST;
                break;
        }

        if(empty($formSumbitData))
            return false;

        Validator::collectData($formSumbitData);

        if(isset($formSumbitData[$this->formName])) {

            foreach ($this->elements as $element) {
                
                $element->setValue(Validator::getValueByKey($element->getAttributeValue('name')));

                if($element->existsValidationRules()) {

                    $validator = new Validator;

                    if(!$validator->validate($element)) {
                        $this->messages[] = $validator->getMessages();
                    }

                }

            }

            if(empty($this->messages)) {
                $this->messages[] = 'Form successfuly verified!';
            }

        }

    }

    /**
     * Get all the messages collected during the validation process
     * 
     * @return array
     */
    public function getMessages() {
        return $this->messages;
    }

	/**
	 * Build form with existing attributes
	 *
	 */
    public function buildForm() {

    	$this->start = '<form';

    	foreach ($this->attributes as $key => $value) {
    		if(!empty($key))
    			$this->start .= ' '.$key.'="'.$value.'"';
    	}

    	$this->start .= '>';

    	$this->end = '</form>';
    }

	/**
	 * Get completed form
	 *
	 * @return str
	 */
    public function getForm() {
    	$tmp = '';
    	foreach ($this->elements as $element) {
    		$tmp .= '<p>'.$element->getElement().'</p>';
    	}

    	return $this->start.$tmp.$this->end;
    }

}