<?php

/**
 * @file
 * Contains \Drupal\onesearch\Plugin\Block\ESARSBlock
 */

namespace Drupal\esars\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides an 'SEP' block.
 *
 * @Block(
 *   id = "sep_block",
 *   admin_label = @Translation("SEP block"),
 * )
 */
class SEPBlock extends BlockBase implements BlockPluginInterface {

public function build() {
	$block['#theme'] = 'sep_block';
	return $block;
	}
}

