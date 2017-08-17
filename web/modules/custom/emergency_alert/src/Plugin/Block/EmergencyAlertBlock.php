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
	private $foo;
	public function __construct() {
		$this->foo = \Drupal::state()->get('emergency');
	}
	public function build() {
	$build = array(
	'#type' => 'markup',
	'#attributes' => array(
		'class' => array('ca-block')
		),
	'#markup' => '
	<div class="container">
		<div class="row">
		  <div class="col-sm-12">
		    <h1><i class="fa fa-bell" aria-hidden="true"></i> Campus Alert</h1>
		  </div>
		</div>
		<div class="row">
		  <div class="col-sm-12">
		    <div class="ca-desc">' .
			t($this->foo) . '
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
  protected function blockAccess(AccountInterface $account) {
	if($this->foo !== '')
		return AccessResult::allowed();
	else
		return AccessResult::forbidden();
  }

}
