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

    $imagepath = base_path() . drupal_get_path('theme', 'miramar');

    $build['contact']['content'] = [
      '#markup' => '
        <div class="row">
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
              <li><a href="http://www.sdmiramar.edu">San Diego Miramar College</a></li>
              <li><a href="http://www.sdce.edu">San Diego Continuing Education</a></li>
            </ul>
          </div>
          <div class="col-sm-9 hide-xs">
            <div class="row">
              <div class="col-sm-4">
                <h4><img src="' . $imagepath . '/images/icon-building.png" alt=""></h4>
                <strong>Campus Information</strong>
                <ul class="campus">
                  <li><a href="/directory">Directory</a></li>
                  <li><a href="https://www.sdccdjobs.com/" target="_blank">Jobs</a></li>
                  <li><a href="/campus/directions">Parking/Transit</a></li>
                  <li><a href="/campus/president">President\'s Message</a></li>
                  <li><a href="http://police.sdccd.edu">Safety</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <h4><img src="' . $imagepath . '/images/icon-users.png" alt=""></h4>
                <strong>Resources &amp; Information</strong>
                <ul class="miramar">
                  <li><a href="http://police.sdccd.edu/jclery.cfm">Clery Act Information</a></li>
                  <li><a href="/campus/foundation">Miramar College Foundation</a></li>
                  <li><a href="/privacy">Privacy Statement</a></li>
                  <li><a href="/faculty-info">Resources for Faculty &amp; Staff</a></li>
                  <li><a href="http://www.sdccd.edu/daapp/">Smoking/Substance Policy</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <h4><img src="' . $imagepath . '/images/icon-note.png" alt=""></h4>
                <strong>Accreditation Information</strong>
                <ul class="acc-info">
                  <li><a href="/accreditation">Accreditation</a></li>
                  <li><a href="/campus/planning">Planning</a></li>
                  <li><a href="http://www1.sdmiramar.edu/webfm_send/15889">Student Success Scorecard</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>'
    ];

    return $build;
  }
}
