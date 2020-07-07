<?php

/**
 * @file
 * Contains \Drupal\student_svcs_chat\Plugin\Block\StudentSvcsChatBlock
 */

namespace Drupal\student_svcs_chat\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'Student Services Chat' block.
 *
 * @Block(
 *   id = "student_svcs_chat_block",
 *   admin_label = @Translation("Student Services Chat block"),
 * )
 */
class StudentSvcsChatBlock extends BlockBase implements BlockPluginInterface {

public function build() {
	$block['#cache']['max-age'] = 0;
	$block['#theme'] = 'chat_block';
	return $block;
	}
}

