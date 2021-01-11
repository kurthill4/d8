<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Contact' block.
 *
 * @Block(
 *   id = "miramar_contact",
 *   admin_label = @Translation("Miramar Contact"),
 * )
 */
class MiramarCustomContactBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
   $intra = '';
   $prefix = '<li>';
   $suffix = '</li>';
 
    if(\Drupal::config('miramarcustom.settings')->get('local_ip') == TRUE or !(\Drupal::currentUser()->isAnonymous())) {
	$intra = $prefix . \Drupal::config('miramarcustom.settings')->get('issues_link') . $suffix;
}
    else {
        $intra = "";
    }

    $build['#cache']['max-age'] = 0;
    $build['contact']['content'] = [
      '#markup' => '
        <div class="row hide-xs">
          <div class="col-sm-3">

            <!-- Address -->
            <div class="address">
              San Diego Miramar College<br />
              10440 Black Mountain Road<br />
              San Diego, CA 92126-2999<br />
              (619) 388-7800
            </div>

            <!-- Colleges -->
            <ul class="colleges hide-xs">
              <li><a href="http://www.sdccd.edu">San Diego Community College District</a></li>
              <li><a href="http://www.sdcity.edu">San Diego City College</a></li>
              <li><a href="http://www.sdmesa.edu">San Diego Mesa College</a></li>
              <li><a href="https://www.sdmiramar.edu">San Diego Miramar College</a></li>
              <li><a href="http://www.sdce.edu">San Diego Continuing Education</a></li>
            </ul>
          </div>
          <div class="col-sm-9 hide-xs">
            <div class="row">
              <div class="col-sm-4">
                <p class="img" role="heading"><img src="' . \Drupal::config('miramarcustom.settings')->get('image_path') . '/images/icon-building.png" alt="Campus Information" /></p>
                <strong>Campus Information</strong>
                <ul class="campus">
                  <li><a href="/directory/people">Directory</a></li>
                  <li><a href="http://www.sdccdjobs.com/" target="_blank">Jobs</a></li>
                  <li><a href="/map">Interactive Map</a></li>
                  <li><a href="/campus/directions">Parking/Transit</a></li>
                  <li><a href="/campus/president">President\'s Message</a></li>
                  <li><a href="https://www.sdccd.edu/about/departments-and-offices/police-department/">Safety</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <p class="img" role="heading"><img src="' . \Drupal::config('miramarcustom.settings')->get('image_path') . '/images/icon-users.png" alt="Resources & Information"></p>
                <strong>Resources &amp; Information</strong>
                <ul class="miramar">
                  <li><a href="/508">Website Accessibility Information</a></li>
                  <li><a href="/sites/default/files/documents/2021-01/heerf-quarterly-reporting-v131.Miramar%20Q2.pdf" target="_blank">CARES Act Information</a></li>
                  <li><a href="https://www.sdccd.edu/about/departments-and-offices/police-department/clery-act.aspx" target="_blank">Clery Act Information</a></li>
                  <li><a href="/campus/foundation">Miramar College Foundation</a></li>
                  <li><a href="/privacy">Privacy Statement</a></li>
                  <li><a href="/facultystaff/faculty-info">Resources for Faculty &amp; Staff</a></li>
                  <li><a href="http://www.sdccd.edu/daapp/" target="_blank">Smoking/Substance Policy</a></li>
                  <li><a href="https://get.adobe.com/reader/" target="_blank">Get Adobe Reader</a></li>' . $intra .
               '</ul>
              </div>
              <div class="col-sm-4">
                <p class="img" role="heading"><img src="' . \Drupal::config('miramarcustom.settings')->get('image_path') . '/images/icon-note.png" alt="Accreditation"></p>
                <strong>Accreditation Information</strong>
                <ul class="acc-info">
                  <li><a href="/accreditation">Accreditation</a></li>
                  <li><a href="/campus/planning">Planning</a></li>
                  <li><a href="/sites/default/files/documents/2017-08/Miramar%20College%20Student%20Success%20Scorecard%202016.pdf
">Student Success Scorecard</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>'
    ];

    return $build;
  }
  public function getCacheMaxAge() {
	return 0;
  }
}
