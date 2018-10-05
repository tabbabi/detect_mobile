<?php
/**
 * @file
 * Contains \Drupal\detect_mobile\Middleware\MobileDetectManagerInterface.
 */

namespace Drupal\detect_mobile\Middleware;

/**
 * Provides an interface to MobileDetectManager.
 *
 * @package Drupal\detect_mobile
 */
interface MobileDetectManagerInterface {

    /**
     * @return mixed
     */
    public function getMobile();

    /**
     * @return mixed
     */
    public function getDesktop();
}
