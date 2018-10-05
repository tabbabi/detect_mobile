<?php
/**
 * @file
 * Contains \Drupal\detect_mobile\Middleware\MobileDetectManager.
 */

namespace Drupal\detect_mobile\Middleware;

/**
 * MobileDetect Manager.
 *
 * @package Drupal\detect_mobile
 */
class MobileDetectManager implements MobileDetectManagerInterface {

  /**
   * Rate limiter configuration storage.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $MobileDetectConfig;

  /**
   * Class Constructor.
   */
  public function __construct() {
    $this->MobileDetectConfig = \Drupal::config('detect_mobile.default_form.settings');
  }

  /**
   * {@inheritdoc}
   */
  public function getDesktop() {
    return $this->MobileDetectConfig->get('desktop_domain');
  }

  /**
   * {@inheritdoc}
   */
  public function getMobile() {
    return $this->MobileDetectConfig->get('mobile_domain');
  }

}
