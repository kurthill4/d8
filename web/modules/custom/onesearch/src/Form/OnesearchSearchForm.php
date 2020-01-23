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
	$form['#attached']['library'] =	'onesearch/btnSubmit';
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
		'#id' => 'primoTab',
		'#value' => 'Everything',
		);
	$form['search_scope'] = array(
		'#name' => 'search_scope',
		'#type' => 'hidden',
		'#id' => 'primoScope',
		'#value' => 'mm_LibraryCatalog_and_CI',
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
		'#id' => 'primoQuery',
		 );
	$form['displayField'] = array(
		'#name' => 'displayField',
		'#type' => 'hidden',
		'#value' => 'all',
		);
	$form['pc'] = array(
		'#name' => 'pcAvailabiltyMode',
		'#id' => 'pcAvailabiltyMode',
		'#type' => 'hidden',
		'#value' => "true",
		);
	$form['scope_options'] = array(
		'#type' => 'value',
		'#value' => array(
			'mm_LibraryCatalog_and_CI' => t('Everything'),
			'SDCCDLibraryCatalog' => t('SDCCDLibraryCatalog'),
			'mm_CourseReserves' => t('CourseReserves')
			)
		);
	$form['scope'] = array(
		'#type' => 'select',
		'#id' => 'scopeSelecter',
		'#name' => 'scopeSelecter',
		'#options' => $form['scope_options']['#value'],
		'#attributes' => array(
			'class' => 'onesearch',
		),
		'#attached' => array(
			'library' => array(
				'onesearch/scope',
			),
		),
	);
    $form['keywords'] = array(
		'#type' => 'textfield',
		'#id' => 'primoQueryTemp',
		'#size' => '38',
		'#maxlength' => '60',
	);
    $form['onesearch_submit'] = array(
	'#id' => 'onesearch_submit',
	'#type' => 'submit',
	'#attributes' => [
		'class' => 'button js-form-submit form-submit btn-primary btn btn-secondary icon-only',
      ],
);
    return $form;
}  

  /**
   * {@inheritdoc}
   */
public function validateForm(array &$form, FormStateInterface $form_state) {
	$form_state->setValue('queryOut', 'any,contains,' . $form_state->getValue('keywords','#value'));
}

  /**
   * {@inheritdoc}
   */
public function submitForm(array &$form, FormStateInterface $form_state) {
	$arrNames = array(
		'institution',
		'vid',
		'tab',
		'search_scope',
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
		$q .= $form[$item]['#name'] . '=' . $form_state->getValue($item,'#value') . '&';
	}
	$u = 'https://caccl-sdccd.primo.exlibrisgroup.com/discovery/search?' . $q;
	$form['#action'] = $u;
	$response = new TrustedRedirectResponse($u, Response::HTTP_FOUND);
	$form_state->setResponse($response);
}
     
}
