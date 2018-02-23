<?php

namespace Drupal\emergency\Plugin\Block;

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
	private $title;

	public function __construct() {
		$this->title = \Drupal::state()->get('emergency_title');
		if(is_null($this->title)) { $this->title = 'SDCCD Districtwide Emergency Alert'; }
		$this->title = t($this->title);
		$this->message = \Drupal::state()->get('emergency_message');
		if( !is_null($this->message)) { $this->message = t($this->message); }
		//if( $this->message == '' ) { $this->message = 'fofp'; }
	}
	public function build() {

		\Drupal::service('page_cache_kill_switch')->trigger();
		$html = "<p>" . $this->message . "</p>";
		if($this->title != '') {
			$html = '<h1 class="title">' . $this->title . '</h1>' . $html;
		}

		$build = array(
			'#type' => 'markup',
			'#attributes' => array(	'class' => array('emergency-alert-block') ),
			'#markup' => $html,
			'#emergency_message' => $this->message;
			'#emergency_title' => $this->title;
			'#cache' => ['max-age' => 0, 'contexts' => ['user']]

		);
		return $build;
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
	if( $this->message != '' )
		return AccessResult::allowed();
	else
		return AccessResult::forbidden();
  }

}
