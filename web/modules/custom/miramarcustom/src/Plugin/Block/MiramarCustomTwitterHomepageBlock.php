<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Render\Markup;


/**
 * Provides a 'Twitter' block.
 *
 * @Block(
 *   id = "twitterforhomepage",
 *   admin_label = @Translation("Twitter Block for Homepage"),
 * )
 */
class MiramarCustomTwitterHomepageBlock extends BlockBase {



  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['twitterforhomepage']['content'] = [
      '#theme' => 'twitter-homepage',
    ];

    return $build;
  }
}
