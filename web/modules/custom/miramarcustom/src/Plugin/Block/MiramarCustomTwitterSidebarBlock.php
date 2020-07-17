<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Render\Markup;


/**
 * Provides a 'Twitter' block in the sidebar.
 *
 * @Block(
 *   id = "twitterforsidebar",
 *   admin_label = @Translation("Twitter Block for Sidebar"),
 * )
 */
class MiramarCustomTwitterSidebarBlock extends BlockBase {



  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['twitterforsidebar']['content'] = [
      '#theme' => 'twitter-sidebar',
    ];

    return $build;
  }
}
