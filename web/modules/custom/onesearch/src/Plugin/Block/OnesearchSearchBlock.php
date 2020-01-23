<?php

/**
 * @file
 * Contains \Drupal\onesearch\Plugin\Block\OnesearchSearchBlock
 */

namespace Drupal\onesearch\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'OneSearch' block.
 *
 * @Block(
 *   id = "onesearch_search__block",
 *   admin_label = @Translation("OneSearch block"),
 * )
 */
class OnesearchSearchBlock extends BlockBase {

	/**
	* {@inheritdoc}
	*/
	function onesearch_search__block_preprocess_block(&$variables) {
		if ($variables['plugin_id'] == 'block_header') {
			$variables['#attached']['library'][] = 'onesearch/onesearch';
		}
	}

	/**
	* {@inheritdoc}
	*/
	public function build() {
		$form =  \Drupal::formBuilder()->getForm('Drupal\onesearch\Form\OnesearchSearchForm');
		return $form;
	}
}

