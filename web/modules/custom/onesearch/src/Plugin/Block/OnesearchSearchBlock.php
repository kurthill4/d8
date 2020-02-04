<?php

/**
 * @file
 * Contains \Drupal\onesearch\Plugin\Block\OnesearchSearchBlock
 */

namespace Drupal\onesearch\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\UrlHelper;

/**
 * Provides a 'OneSearch' block.
 *
 * @Block(
 *   id = "onesearch_search__block",
 *   admin_label = @Translation("OneSearch block"),
 * )
 */
class OnesearchSearchBlock extends BlockBase implements BlockPluginInterface {

public function build() {
	$form = \Drupal::formBuilder()->getForm('Drupal\onesearch\Form\OnesearchSearchForm');
	$block['form'] = $form;
	$block['#theme'] = 'onesearch_block';
	return $block;
	}
}

