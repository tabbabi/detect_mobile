<?php

namespace Drupal\detect_mobile\Middleware;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * MobileDetectMiddleware middleware.
 */
class MobileDetectMiddleware implements HttpKernelInterface {

  /**
   * The kernel.
   *
   * @var \Symfony\Component\HttpKernel\HttpKernelInterface
   */
  protected $httpKernel;

  /**
   * Rate MobileDetect manager instance.
   *
   * @var \Drupal\detect_mobile\Middleware\MobileDetectManagerInterface
   */
  protected $manager;

  /**
   *
   */
  public function __construct(HttpKernelInterface $http_kernel, MobileDetectManagerInterface $manager) {
    $this->httpKernel = $http_kernel;
    $this->manager = $manager;
  }

  /**
   * {@inheritdoc}
   */
  public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = TRUE) {
    $mobileDetector = \Drupal::service('mobile_detect');
    $mobileDomain = $this->manager->getMobile();
    $desktopDomain = $this->manager->getDesktop();
    $http_host = $request->getHttpHost();
    $req_uri = $request->getRequestUri();
    $req_sheme = $request->getScheme();
    if (!empty($mobileDomain) && $mobileDetector->isMobile() && $http_host !== $mobileDomain) {
      return new RedirectResponse($req_sheme . '://' . $mobileDomain . $req_uri);
    }
    if (!empty($desktopDomain) && !$mobileDetector->isMobile() && $http_host !== $desktopDomain) {
      return new RedirectResponse($req_sheme . '://' . $desktopDomain . $req_uri);
    }
    return $this->httpKernel->handle($request, $type, $catch);
  }

}
