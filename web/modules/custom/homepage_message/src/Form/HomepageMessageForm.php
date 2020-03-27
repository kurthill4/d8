<?php

/**
 * @file
 * Contains \Drupal\homepage_message\Form\HomepageMessageForm.
 */

namespace Drupal\homepage_message\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

class HomepageMessageForm extends ConfigFormBase {

	const SETTINGS = 'homepage_message.settings';	// Get module settings for template values

	/**
	 * {@inheritdoc}.
	 */
	public function getFormId() {
		return 'homepage_message_form';
	}

	/** 
	 * {@inheritdoc}
	 */
	protected function getEditableConfigNames() {
		return [
			static::SETTINGS,
		];
	}

	/** 
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state) {
		$config = $this->config(static::SETTINGS);

		$form['homepage_headline_1'] = array(
			'#type' => 'textfield',
			'#title' => 'Main Headline (35 character maximum)',
			'#maxlength' => '35',
			'#default_value' => $config->get('home_headline_1'),
			'#attributes' => array(
				'autofocus' => 'autofocus',
				//'onfocus' => 'this.select()',
			),
		);
		$form['homepage_headline_2'] = array(
			'#type' => 'textfield',
			'#title' => 'Second Headline (35 character maximum)',
			'#default_value' => $config->get('home_headline_2'),
			'#maxlength' => '35',
		);
		$form['homepage_link_text'] = array(
			'#type' => 'textfield',
			'#title' => 'Link Text (35 character maximum)',
			'#default_value' => $config->get('home_link_text'),
			'#maxlength' => '35',
		);
		$form['homepage_link_url'] = array(
			'#type' => 'textfield',
			'#title' => 'Link URL',
			'#default_value' => $config->get('home_link_url'),
			'#maxlength' => '255',
		);
		$form['onesearch_submit'] = array(
			'#id' => 'onesearch_submit',
			'#type' => 'submit',
			'#value' => 'Submit',
		);

		return $form;
	}

  /**
   * {@inheritdoc}
   */
	public function validateForm(array &$form, FormStateInterface $form_state) {

		if (!$form_state->getValue('homepage_headline_1') || empty($form_state->getValue('homepage_headline_1'))) {
			$form_state->setErrorByName('homepage_headline_1', $this->t('Please enter main headline'));
		}
		if (!$form_state->getValue('homepage_headline_2') || empty($form_state->getValue('homepage_headline_2'))) {
			$form_state->setErrorByName('homepage_headline_2', $this->t('Please enter second headline'));
		}
		if (!$form_state->getValue('homepage_link_text') || empty($form_state->getValue('homepage_link_text'))) {
			$form_state->setErrorByName('homepage_link_text', $this->t('Please enter link text'));
		}
		if (!$form_state->getValue('homepage_link_url') || empty($form_state->getValue('homepage_link_url')) || strpos($form_state->getValue('homepage_link_url'),"avascript:",1) != FALSE) {
			$form_state->setErrorByName('homepage_link_url', $this->t('Please enter link URL'));
		}
		else {
			if(!UrlHelper::isValid($form_state->getValue('homepage_link_url')) || UrlHelper::isValid($form_state->getValue('homepage_link_url')) == FALSE) {
			$form_state->setErrorByName('homepage_link_url', $this->t('Please enter a valid internal or external URL'));
			}
		}
	}

  /**
   * {@inheritdoc}
   */
	public function submitForm(array &$form, FormStateInterface $form_state) {
		// Retrieve the configuration.
		$this->configFactory->getEditable(static::SETTINGS) // Set the submitted configuration setting.
			->set('home_headline_1', $form_state->getValue('homepage_headline_1'))
			->set('home_headline_2', $form_state->getValue('homepage_headline_2'))
			->set('home_link_text', $form_state->getValue('homepage_link_text'))
			->set('home_link_url', $form_state->getValue('homepage_link_url'))
			->save();

		parent::submitForm($form, $form_state);
	}
}
