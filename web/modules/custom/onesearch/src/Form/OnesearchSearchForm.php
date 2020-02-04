<?php

/**
 * @file
 * Contains \Drupal\onesearch\Form\OnesearchSearchForm.
 */

namespace Drupal\onesearch\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\UrlHelper;

class OneSearchSearchForm extends FormBase {
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'onesearch_search_form';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	$form['#id'] = 'simple';
	$form['#attached'] = array(
		'library' => array(
			'onesearch/btnSubmit',
		),
	);
	//$form['#prefix'] = '<div id="onesearch">';
	//$form['#suffix'] = '</div>';

	$form['institution'] = array(
		'#name' => 'institution',
		'#type' => 'hidden',
		'#value' => '01CACCL_SDCCD',
		);
	$form['vid'] = array(
		'#name' => 'vid',
		'#type' => 'hidden',
		'#value' => '01CACCL_SDCCD:SDMIRAMAR',
		);
	$form['tab'] = array(
		'#name' => 'tab',
		'#type' => 'hidden',
		'#value' => 'Everything',
		'#attributes' => array(
			'id' => 'primoTab',
			),
		);
	$form['search_scope'] = array(
		'#name' => 'search_scope',
		'#type' => 'hidden',
		'#value' => 'mm_LibraryCatalog_and_CI',
		'#attributes' => array(
			'id' => 'primoScope',
			),
		);
	$form['mode'] = array(
		'#name' => 'mode',
		'#type' => 'hidden',
		'#value' => 'basic',
		);
	$form['displayMode'] = array(
		'#name' => 'displayMode',
		'#type' => 'hidden',
		'#value' => 'full',
		);
	$form['bulkSize'] = array(
		'#name' => 'bulkSize',
		'#type' => 'hidden',
		'#value' => '10',
		);
	$form['highlight'] = array(
		'#name' => 'highlight',
		'#type' => 'hidden',
		'#value' => "true",
		);
	$form['dum'] = array(
		'#name' => 'dum',
		'#type' => 'hidden',
		'#value' => "true",
		);
	$form['queryOut'] = array(
		'#name' => 'query',
		'#type' => 'hidden',
		'#attributes' => array(
			'id' => 'primoQuery',
			),

		 );
	$form['displayField'] = array(
		'#name' => 'displayField',
		'#type' => 'hidden',
		'#value' => 'all',
		);
	$form['pc'] = array(
		'#name' => 'pcAvailabiltyMode',
		'#type' => 'hidden',
		'#value' => "true",
		'#attributes' => array(
			'id' => 'pcAvailabiltyMode',
			),

		);
	$form['keywords'] = array(
		'#type' => 'textfield',
		'#id' => 'primoQueryTemp',
		'#size' => '38',
		'#maxlength' => '60',
		'#attributes' => array(
			'placeholder' => 'Find articles, books, & more',
		),
	);
	$form['onesearch_submit'] = array(
		'#id' => 'onesearch_submit',
		'#type' => 'submit',
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
		$form_state->setValue('queryOut', 'any,contains,' . $form_state->getValue('keywords','#value'));

		$arrNames = array( 
			'institution',
			'vid',
			'tab',
			'mode',
			'displayMode',
			'bulkSize',
			'highlight',
			'dum',
			'queryOut',
			'displayField',
			'pc'
		);
		foreach($arrNames as $item) {
			$queryOut .= $form[$item]['#name'] . '=' . $form_state->getValue($item,'#value') . '&';
		}
		$urlOut = 'https://caccl-sdccd.primo.exlibrisgroup.com/discovery/search?' . $queryOut;
		$form['#action'] = $urlOut;
		$response = new TrustedRedirectResponse($urlOut, Response::HTTP_FOUND);
		$form_state->setResponse($response);
	}

}
