<?php

/**
 * @file
 * Contains \Drupal\onesearch\Plugin\Block\ESARSBlock
 */

namespace Drupal\esars\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides an 'eSARS' block.
 *
 * @Block(
 *   id = "esars_block",
 *   admin_label = @Translation("eSARS block"),
 * )
 */
class ESARSBlock extends BlockBase implements BlockPluginInterface {

public function build() {
	$block['#theme'] = 'esars_block';
	return $block;
	}
}

