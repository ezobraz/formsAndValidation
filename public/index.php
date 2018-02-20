<?php
/*-------------------------------------------------/
 *
 * This form self-validates itself when submitted
 *
 * Author: @ezobraz
 *
 *------------------------------------------------*/

require_once "../autoload.php";

use app\Forms\HtmlForm;
use app\Forms\FormElements\Input;
use app\Forms\FormElements\Textarea;
use app\Forms\FormElements\Checkbox;
use app\Forms\FormElements\Radiobutton;
use app\Forms\FormElements\Select;
use app\Forms\FormElements\Button;

/**
 * Create new form object and set attributes
 *
 * Note: form accepts name as a param, so it can Create a hidden input with this name, 
 * so the form can define itself during the self-verification
 *
 * Note: setAttributes accepts 1 array as a param where key is the attribute name and velue is attribute value
 * OR 2 string params: attribute name and attribute value
 * 
 * For example:
 *
 * $form->setAttributes('method', 'post');
 * $form->setAttributes('action', './');
 */
$form = new HtmlForm('uniqueNameForThisForm');
$form->setAttributes([
	'method' => 'post', 
	'action' => './'
]);

/**
 * Create Input element and push it into the form
 *
 * Note: setAttributes accepts 1 array as a param where key is the attribute name and velue is attribute value
 * OR 2 string params: attribute name and attribute value
 *
 * Note: setValidationRules accepts 1 array of rules where key is the rule name, and value is the error message
 * OR 2 string arguments: rule name and error message
 *
 */
$firstNameField = new Input();
$firstNameField->setAttributes([
	'type' => 'text',
	'name' => 'fname',
	'placeholder' => 'First name'
]);
$firstNameField->setValidationRules([
	'required' => 'You have to input your first name'
]);

$form->pushElement($firstNameField);

// Create Input element and push it into the form
$emailField = new Input();
$emailField->setAttributes('type', 'text');
$emailField->setAttributes('name', 'email');
$emailField->setAttributes('placeholder', 'Your email');
$emailField->setValidationRules('required', 'Email can not be empty');
$emailField->setValidationRules('email', 'You have to input proper email');

$form->pushElement($emailField);

// Create Input element and push it into the form
$telephoneField = new Input();
$telephoneField->setAttributes('type', 'text');
$telephoneField->setAttributes('name', 'telephone');
$telephoneField->setAttributes('placeholder', 'Your phone number');
$telephoneField->setValidationRules('required', 'Phone number can not be empty');
$telephoneField->setValidationRules('telephone', 'You have to input proper phone number');

$form->pushElement($telephoneField);

// Create Textarea element and push it into the form
$messageField = new Textarea();
$messageField->setAttributes('type', 'text');
$messageField->setAttributes('name', 'message');
$messageField->setAttributes('placeholder', 'Write here soomething...');
$messageField->setText('This is text');

$form->pushElement($messageField);

// Create Checkbox element and push it into the form
$checkboxField = new Checkbox();
$checkboxField->setAttributes('name', 'check');
$checkboxField->setAttributes('value', '1');
$checkboxField->setText('Accept soomething');
$checkboxField->setValidationRules('required', 'You should accept soomething');

$form->pushElement($checkboxField);

// Create Radiobutton element and push it into the form
$radioField_a = new Radiobutton();
$radioField_a->setAttributes('name', 'radio');
$radioField_a->setAttributes('value', 'a');
$radioField_a->setText('This is radio a');

$form->pushElement($radioField_a);

// Create Radiobutton element and push it into the form
$radioField_b = new Radiobutton();
$radioField_b->setAttributes('name', 'radio');
$radioField_b->setAttributes('value', 'b');
$radioField_b->setText('This is radio b');

$form->pushElement($radioField_b);

// Create Select element and push it into the form
$selectField = new Select();
$selectField->setAttributes('name', 'select');
$selectField->setOption('1', 'First option');
$selectField->setOption('2', 'Second option');
$selectField->setValidationRules('required', 'You should chose soomething');

$form->pushElement($selectField);

// Create Button element and push it into the form
$submitButton = new Button();
$submitButton->setAttributes('name', 'formOneSbmit');
$submitButton->setAttributes('type', 'submit');
$submitButton->setText('Submit');

$form->pushElement($submitButton);

// This method checks if form was submitted and self-validates the form
$form->process();

// Get and output all the messages collected during the validation
if(!empty($form->getMessages())) {
	echo '<pre>';
	print_r($form->getMessages());
	echo '</pre>';
}

// Build form (html)
$form->buildForm();

// echo built form
echo $form->getForm();

