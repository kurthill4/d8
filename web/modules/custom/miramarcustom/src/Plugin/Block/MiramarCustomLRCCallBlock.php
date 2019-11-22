<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_lrccall",
 *   admin_label = @Translation("Library/LRC Call to Action"),
 * )
 */
class MiramarCustomLRCCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['#theme'] = 'lrccall';

    return $build;
  }
}
