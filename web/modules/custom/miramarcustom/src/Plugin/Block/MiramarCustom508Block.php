<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Render\Markup;


/**
 * Provides an 'Accessibility' block in the sidebar.
 *
 * @Block(
 *   id = "508",
 *   admin_label = @Translation("Accessibility Resources Block for Sidebar"),
 * )
 */
class MiramarCustom508Block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['508']['content'] = [
      '#markup' => '<ul>
	<li><a href="https://www.section508.gov/" target="_blank">Section508.gov</a></li>
	<li><a href="https://www.w3.org/WAI/Resources/" target="_blank">W3C Accessibility Initiative</a></li>
	<li><a href="https://webaim.org/resources/" target="_blank">Accessibility Information at WebAIM.org</a></li>
	<li><a href="https://www.sdccd.edu/about/accessibility-statement.aspx" target="_blank">SDCCD Accessibility Statement</a></li>
</ul>',
    ];

    return $build;
  }
}
