<?php

namespace Drupal\simple_shell\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleShellForm extends FormBase {

	/**
	 * {@inheritdoc}
	 */
	public function getFormId() {
		return 'simple_shell_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state) {
		$form['command'] = array(
			'#type' => 'textfield',
			'#title' => $this->t('Command'),
			'#default_value' => $form_state->getValue('command'),
			'#description' => $this->t('Command to run on the server'),
		);
		$form['save'] = array(
			'#type' => 'submit',
			'#value' => $this
				->t('Run'),
		);
		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state) {

	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state) {
	}
}
