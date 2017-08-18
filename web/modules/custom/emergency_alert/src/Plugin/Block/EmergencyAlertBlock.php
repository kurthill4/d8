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
	private $message;
	public function __construct() {
		$this->message = \Drupal::state()->get('emergency');
	}
	public function build() {
	$build = array(
	'#type' => 'markup',
	'#attributes' => array(
		'class' => array('ca-block')
		),
	'#emergency' => $this->message,
	'#theme' => 'block__emergency_alert',
	);
	return $build;
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
	if($this->message !== '')
		return AccessResult::allowed();
	else
		return AccessResult::forbidden();
  }

}
