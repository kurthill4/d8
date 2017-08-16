<?php

namespace Drupal\emergency_alert\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block for the District emergency alert.
 *
 * @Block(
 *   id = "emergency_alert",
 *   admin_label = @Translation("Emergency Alert"),
 * )
 */
class EmergencyAlertBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */

  public function build() {
//	$foo = \Drupal::state()->get(t('emergency'));
$foo = "bar";
    $build = array(
	'#type' => 'markup',
      '#markup' => '
	<div class="container">
		<div class="row">
		  <div class="col-sm-12">
		    <h1><i class="fa fa-bell" aria-hidden="true"></i> Campus Alert</h1>
		  </div>
		</div>
		<!--div class="row">
		  <div class="col-sm-3">
		    <div class="ca-date">
		    </div>
		  </div-->
		  <div class="col-sm-12">
		    <div class="ca-desc">' .
			t($foo) . '
		    </div>
		  </div>
		</div>
      	</div>'
    );
	return $build;
  }

  /**
   * {@inheritdoc}
   */
  /*protected function blockAccess(&$variables,Drupal\Core\Session\AccountInterface $account) {
	if($variables['emergency'] != '')
		return AccessResult::allowedIfHasPermission($account, 'access content');
	else
		return AccessResult::forbidden();
  }*/

}
