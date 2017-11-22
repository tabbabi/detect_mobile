<?php

namespace Drupal\detect_mobile\tests;

use Drupal\detect_mobile\Detect\MobileDetect;
use Drupal\detect_mobile\Twig\MobileDetectExtension;

/**
 * Description of MobileDetectExtensionTest
 *
 * @author mtabbabi
 */
class MobileDetectExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var MobileDetect
     */
    protected $detectMobile;
    
    /**
     *
     * @var MobileDetectExtension 
     */
    protected $object;
    
    public function setUp() 
    {
        $this->detectMobile = $this->createMock(MobileDetect::class);
        $this-> object = new MobileDetectExtension($this->detectMobile);
    }
}
