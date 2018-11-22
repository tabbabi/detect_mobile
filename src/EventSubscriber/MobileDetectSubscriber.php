<?php

namespace Drupal\detect_mobile\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Class MobileDetectSubscriber.
 *
 * @package Drupal\detect_mobile\EventSubscriber
 */
class MobileDetectSubscriber implements EventSubscriberInterface {

  /**
   * Registers the methods in this class that should be listeners.
   *
   * @return array
   *   An array of event listener definitions.
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['onResponse'];
    return $events;
  }

  /**
   * Manipulates the response object.
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   The Event to process.
   */
  public function onResponse(FilterResponseEvent $event) {
    $config = \Drupal::config('detect_mobile.default_form.settings');
    $md = $config->get('mobile_domain');
    $dd = $config->get('desktop_domain');
    $response = $event->getResponse();
    $version = $event->getRequest()->query->get('version');
    if (!empty($dd) && $version == 'desktop') {
      $cookie = new Cookie('site_version', 'desktop');
      $response->headers->setCookie($cookie);
    }
    elseif (!empty($md) && $version == 'mobile') {
      $cookie = new Cookie('site_version', 'mobile');
      $response->headers->setCookie($cookie);
    }
  }

}
