<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_plancall",
 *   admin_label = @Translation("Planning Page Call to Action"),
 * )
 */
class MiramarCustomPlanningCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['#theme'] = 'plancall';

    return $build;
  }
}
