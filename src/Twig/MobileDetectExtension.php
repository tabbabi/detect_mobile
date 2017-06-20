<?php
namespace Drupal\detect_mobile\Twig;

use Drupal\detect_mobile\Detect\MobileDetect;
/**
 * MobileDetectExtension class
 *
 * @author <marwen.tabbabi@gmail.com>
 */
class MobileDetectExtension extends \Twig_Extension
{
    /**
     * @var MobileDetect
     */
    protected $mobileDetector;

  /**
   * Constructor
   * @param MobileDetect $mobileDetector
   */
    public function __construct(MobileDetect $mobileDetector)
    {
        $this->mobileDetector = $mobileDetector;
    }

    /**
     * Get extension twig function
     * @return array
     */
    public function getFunctions()
    {
          return array(
            'is_mobile' => new \Twig_Function_Function(array($this, 'isMobile')),
            'is_tablet' => new \Twig_Function_Function(array($this, 'isTablet')),
            'is_device' => new \Twig_Function_Function(array($this, 'isDevice')),
            'is_ios' => new \Twig_Function_Function(array($this, 'isIOS')),
            'is_android_os' => new \Twig_Function_Function(array($this, 'isAndroidOS')),
        );
    }

    /**
     * Is mobile
     * @return boolean
     */
    public function isMobile()
    {
        return $this->mobileDetector->isMobile();
    }

    /**
     * Is tablet
     * @return boolean
     */
    public function isTablet()
    {
        return $this->mobileDetector->isTablet();
    }

    /**
     * Is device
     * @param string $deviceName is[iPhone|BlackBerry|HTC|Nexus|Dell|Motorola|Samsung|Sony|Asus|Palm|Vertu|...]
     *
     * @return boolean
     */
    public function isDevice($deviceName)
    {
        $magicMethodName = 'is' . strtolower((string) $deviceName);

        return $this->mobileDetector->$magicMethodName();
    }

    /**
     * Is iOS
     * @return boolean
     */
    public function isIOS()
    {
        return $this->mobileDetector->isIOS();
    }

    /**
     * Is Android OS
     * @return boolean
     */
    public function isAndroidOS()
    {
        return $this->mobileDetector->isAndroidOS();
    }

    /**
     * Extension name
     * @return string
     */
    public function getName()
    {
        return 'mobile_detect.twig.extension';
    }
}
