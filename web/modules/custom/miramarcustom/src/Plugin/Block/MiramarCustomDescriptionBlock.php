<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Description' block.
 *
 * @Block(
 *   id = "miramar_description",
 *   admin_label = @Translation(" Miramar Footer Description"),
 * )
 */
class MiramarCustomDescriptionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
   $intra1 = '';
   $prefix = '<br /><span class=\"hide-lg\">';
   $suffix = '</span>';
 
    if(\Drupal::config('sdmiramarcustom.settings')->get('local_ip') == TRUE or !(\Drupal::currentUser()->isAnonymous())) {
	$intra1 = $prefix . \Drupal::config('sdmiramarcustom.settings')->get('issues_link') . $suffix;
	}
    else {
        $intra1 = "";
    }

    $build['description']['content'] = [
      '#markup' => '
        <div class="row hide-lg">
          <div class="col-sm-12">
            <div class="centered center hide-lg">
        	<a href="http://www.sos.ca.gov/elections/voting-resources/voting-california/"><img src="' . \Drupal::config('sdmiramarcustom.settings')->get('image_path') . '/images/footer/vote.png" alt="Register to Vote"></a>
	    </div>
 	    <div class="spacer" style="height:0.75em">&nbsp;</div>
           <!-- Social Media -->
            <div class="social-media hide-lg">
              <a href="https://www.facebook.com/SanDiegoMiramarCollege"><i class="fa fa-facebook" aria-hidden="true" title="Facebook"></i><span class="sr-only">Facebook</span></a>
              <a href="https://twitter.com/SDMiramar"><i class="fa fa-twitter" aria-hidden="true" title="Twitter"></i><span class="sr-only">Twitter</span></a>
              <a href="https://instagram.com/sdmiramar/"><i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i><span class="sr-only">Instagram</span></a>
              <a href="https://www.pinterest.com/MiramarCollege/"><i class="fa fa-pinterest" aria-hidden="true" title="Pinterest"></i><span class="sr-only">Pinterest</span></a>
              <a href="https://www.youtube.com/channel/UCAW9o2tK52NekfZFixJOU0w"><i class="fa fa-youtube" aria-hidden="true" title="YouTube"></i><span class="sr-only">YouTube</span></a>
            </div>
            <div class="address">
              San Diego Miramar College<br />
              10440 Black Mountain Road<br />
              San Diego, CA 92126-2999<br />
              (619) 388-7800' . $intra1 . 
            '</div>
          </div>
        </div>'
    ];

    return $build;
  }
}
