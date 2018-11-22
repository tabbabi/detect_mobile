<?php

namespace Drupal\detect_mobile\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DetectMobileBlock' block.
 *
 * @Block(
 *  id = "detect_mobile_block",
 *  admin_label = @Translation("Select site version block"),
 * )
 */
class MobileDetectBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('detect_mobile.default_form.settings');
    return [
      '#theme' => 'detect_mobile_block',
      '#mobile_d' => $config->get('mobile_domain'),
      '#desktop_d' => $config->get('desktop_domain'),
      '#http_host' => \Drupal::request()->getHost(),
    ];
  }

}
