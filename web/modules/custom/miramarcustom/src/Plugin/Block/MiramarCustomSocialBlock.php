<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Social' block in the footer.
 *
 * @Block(
 *   id = "miramar_social",
 *   admin_label = @Translation("Miramar Social Media Links"),
 * )
 */
class MiramarCustomSocialBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
        $imagepath = base_path() . drupal_get_path('theme', 'miramar');
	if(!\Drupal::currentUser()->isAnonymous())
		$logOut = ' | <a href="/user/logout">Log Out</a>';
	else
		$logOut = '';
    $build['social']['content'] = [
      '#markup' => '
<div class="bottom-footer">
        <div class="row">
          <div class="col-sm-12">

            <!-- Social Media -->
            <div class="centered center hide-xs">
        	<a href="http://www.sos.ca.gov/elections/voting-resources/voting-california/"><img src="' . $imagepath . '/images/footer/vote.png" alt="Register to Vote"></a>
	    </div>
	    <div class="spacer" style="height:0.75em">&nbsp;</div>
            <div class="social-media hide-xs">
              <a href="https://www.facebook.com/SanDiegoMiramarCollege"><i class="fa fa-facebook" aria-hidden="true" title="Facebook"></i><span class="sr-only">Facebook</span></a>
              <a href="https://twitter.com/SDMiramar"><i class="fa fa-twitter" aria-hidden="true" title="Twitter"></i><span class="sr-only">Twitter</span></a>
              <a href="https://instagram.com/sdmiramar/"><i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i><span class="sr-only">Instagram</span></a>
              <a href="https://www.pinterest.com/MiramarCollege/"><i class="fa fa-pinterest" aria-hidden="true" title="Pinterest"></i><span class="sr-only">Pinterest</span></a>
              <a href="https://www.youtube.com/channel/UCAW9o2tK52NekfZFixJOU0w"><i class="fa fa-youtube" aria-hidden="true" title="YouTube"></i><span class="sr-only">YouTube</span></a>
            </div>
            <div class="copyright">
              &copy; 2017 San Diego Miramar College | <a href="/legal">Disclaimer</a>'
		. $logOut . '
            </div>
          </div>
        </div>
</div>'
    ];

    return $build;
  }
}
